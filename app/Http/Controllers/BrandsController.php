<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Post;
use App\Enums\EState;
use App\Setting;
use App\Like;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Cache;

class BrandsController extends Controller
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
        $items = Post::query()
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->whereType('news')
            ->orderBy('published_at', 'DESC')
            ->paginate(10);

        $settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return view('site.news.index', compact('items', 'settings'));
    }

    /**
     * Show the blog in site
     *
     * @param null $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function show($slug)
    {
        $item = Brand::query()
            ->where('state', EState::enabled)
            ->whereSlug($slug)
            ->first();

        if (!$item) {
            return response(view('errors.404'), 404);
            // abort(404, 'Not Found.');
        }

        $item->withoutTimestamps()->increment('hits');

        $latestNews = Post::query()
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->whereType('news')
            ->orderBy('published_at', 'DESC')
            ->limit(5)
            ->get();

        $sharerUrl = [
            'facebookUrl' => 'https://www.facebook.com/sharer/sharer.php?u=' . $item->link,
            'gplusUrl' => 'https://plus.google.com/share?url=' . $item->link,
            //'telegramUrl' => 'https://telegram.me/share/url?url=' . $item->link . '&text=' . $item->title,
            'twitterUrl' => 'http://twitter.com/share?url=' . $item->link . '&text=' . $item->title
        ];

        $pageTitle = $item->title_fa . ' | ' . $this->settings['site_title'];

        return view('site.projects.brand', compact('item', 'latestNews', 'sharerUrl', 'pageTitle'));
    }

    public function preview($id)
    {
        if (!\Auth::check()) {
            return response(view('errors.404'), 404);
        }

        $blog = Post::with('user', 'tags', 'categories')->withCount(['comments' => function ($q) {
            $q->where('status', Comment::approved)->where('state', 1);
        }, 'thumbsUp'])->find($id);

        $comments = collect([]);

        $isLikedBefore = Like::where('user_ip', \Request::ip())->exists();

        $latestNews = Post::isActive()->where('id', '!=', $blog->id)->orderBy('published_at', 'DESC')->limit(5)->get();

        $sharerUrl = [
            'facebookUrl' => 'https://www.facebook.com/sharer/sharer.php?u=' . $blog->link,
            'gplusUrl' => 'https://plus.google.com/share?url=' . $blog->link,
            //'telegramUrl' => 'https://telegram.me/share/url?url=' . $blog->link . '&text=' . $blog->title,
            'twitterUrl' => 'http://twitter.com/share?url=' . $blog->link . '&text=' . $blog->title
        ];

        $pageTitle = $blog->title . ' | ' . $this->settings['site_title'];

        return view('news.show', compact('blog', 'latestNews', 'sharerUrl', 'isLikedBefore', 'comments', 'pageTitle'));
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
                    'message' => trans('site.blogs.comment_liked'),
                    'likes_count' => $item->thumbs_up_count + 1
                ]);
            }

            // If user has voted before, remove his vote
            $query->delete();

            // $item->decrement('likes_count');

            \DB::commit();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.blogs.you_took_your_vote_back'),
                'likes_count' => $item->thumbs_up_count - 1
            ]);

        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.blogs.vote_submit_error'),
            ], 400);
        }
    }
}
