<?php

namespace App\Http\Controllers;

use App\Enums\ECommentType;
use App\Page;
use App\Post;
use App\Enums\EState;
use App\Setting;
use App\Like;
use App\Comment;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use App\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Cache;

class VideosController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Video::query();

        $query->when($request->filled('order') && $request->input('order') == 'hits', function ($query) {
            $query->orderBy('hits', 'DESC');
        }, function ($query) {
            $query->orderBy('published_at', 'DESC');
        });

        $items = $query
            ->with('categories', 'media')
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
//            ->withCount('comments')
            ->paginate(12);

        $latest = Video::query()
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'DESC')
//            ->withCount('comments')
            ->take(5)
            ->get();

        return view('site.videos.index', compact('items', 'latest'));
    }

    /**
     * Show the blog in site
     *
     * @param $id
     * @param null $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id, $slug = null)
    {
        $page = Page::query()
            ->whereState(EState::enabled)
            ->where('page_name', 'blog_page')
            ->first();

        $item = Video::query()
            ->with('user', 'categories', 'media', 'tags')
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->withCount(['comments' => function ($q) {
                $q/*->where('comments.status', ECommentType::approved)*/
                ->where('comments.state', EState::enabled);
            }])
            ->findOrFail($id);

        if (!$item) {
            return response(view('errors.404'), 404);
            // abort(404, 'Not Found.');
        }

        $correctSlug = $item->slug;
        if (!$slug || $slug != $correctSlug) {
            $slug = $correctSlug;
            return \Redirect::route('site.videos.show', compact('id', 'slug'));
        }

        $item->withoutTimestamps()->increment('hits');

        $latest = Video::query()
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'DESC')
//            ->withCount('comments')
            ->take(5)
            ->get();

        $comments = $item->comments()
            ->where('status', ECommentType::approved)
            ->where('state', 1)
            ->orderBy('id', 'DESC')
            ->get();

        $sharerUrl = [
            'facebookUrl' => 'https://www.facebook.com/sharer/sharer.php?u=' . $item->link,
            'gplusUrl' => 'https://plus.google.com/share?url=' . $item->link,
            'telegramUrl' => 'https://telegram.me/share/url?url=' . $item->link . '&text=' . $item->title,
            'twitterUrl' => 'http://twitter.com/share?url=' . $item->link . '&text=' . $item->title
        ];

        return view('site.videos.show', compact('item', 'page', 'sharerUrl', 'latest', 'comments'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function like(Request $request, $id)
    {
        try {
            \DB::beginTransaction();

            $item = Post::isActive()->withCount('thumbsUp')->lockForUpdate()->findOrFail($id);

            $query = $item->likes()->where(function ($query) use ($request) {
                return \Auth::check()
                    ? $query->orWhere('user_id', \Auth::id())
                    : $query->whereNull('user_id')->where('user_ip', $request->getClientIp());
            });

            if (!$query->exists()) {
                $item->likes()->create([
                    'user_id' => \Auth::check() ? \Auth::id() : null,
                    'user_ip' => $request->getClientIp(),
                    'score_type' => Like::thumbs_up,
                    'state' => 1
                ]);

                // $item->increment('likes_count');

                \DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => trans('site.videos.comment_liked'),
                    'likes_count' => $item->thumbs_up_count + 1
                ]);
            }

            // If user has voted before, remove his vote
            $query->delete();

            // $item->decrement('likes_count');

            \DB::commit();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.videos.you_took_your_vote_back'),
                'likes_count' => $item->thumbs_up_count - 1
            ]);

        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.videos.vote_submit_error'),
            ], 400);
        }
    }
}
