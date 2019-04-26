<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Enums\ECommentType;
use App\Enums\EInventoryStatus;
use App\Enums\ELikeType;
use App\Page;
use App\Post;
use App\Enums\EState;
use App\Product;
use App\Project;
use App\Setting;
use App\Like;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProjectsController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = Page::query()
            ->whereState(EState::enabled)
            ->where('page_name', 'projects_page')
            ->first();

        $items = Project::query()
            ->with('categories')
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->orderBy('published_at', 'DESC')
            ->paginate(12);
//        dd($items);

        $categories = $this->getCategories();

        return view('site.projects.index', compact('page', 'items', 'categories'));
    }

    /**
     * Show the application dashboard.
     *
     * @param $category_slug
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function categories($category_slug, Request $request)
    {
        $item = '';
        if ($category_slug) {
            $item = Category::query()
                ->where('slug', $category_slug)
                ->firstOrFail();
        }

        $items = Project::query()
            ->where('state', EState::enabled)
            ->when($item, function ($query) use ($item) {
                return $query->where('category_id', $item->id);
            })
            ->orderBy('id', 'DESC')
            ->paginate(12);

        $latestNews = Post::query()
            ->where('state', EState::enabled)
            ->where('published_at', '<', Carbon::now())
            ->whereType('news')
            ->orderBy('published_at', 'DESC')
            ->limit(5)
            ->get();

        $categories = $this->getCategories();

        return view('site.projects.categories', compact('items', 'type', 'category', 'latestNews', 'item', 'categories'));
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
        $item = Project::query()
            ->where('state', EState::enabled)
            ->with('user', 'categories', 'media')
            ->withCount(['comments' => function ($q) {
                $q/*->where('comments.status', ECommentType::approved)*/->where('comments.state', EState::enabled);
            }])
            ->find($id);

        $prevProject = Project::query()
            ->where('state', EState::enabled)
            ->where('id', '<', $id)
            ->orderBy('id', 'DESC')
            ->first();

        $nextProject = Project::query()
            ->where('state', EState::enabled)
            ->where('id', '>', $id)
            ->orderBy('id', 'ASC')
            ->first();

        if (!$item) {
            return response(view('errors.404'), 404);
            // abort(404, 'Not Found.');
        }

        $correctSlug = $item->slug;
        if (!$slug || $slug != $correctSlug) {
            $slug = $correctSlug;
            return \Redirect::route('site.projects.show', compact('id', 'slug'));
        }

        $item->withoutTimestamps()->increment('hits');

        $sharerUrl = [
            'facebookUrl' => 'https://www.facebook.com/sharer/sharer.php?u=' . $item->link,
            'gplusUrl' => 'https://plus.google.com/share?url=' . $item->link,
            //'telegramUrl' => 'https://telegram.me/share/url?url=' . $item->link . '&text=' . $item->title,
            'twitterUrl' => 'http://twitter.com/share?url=' . $item->link . '&text=' . $item->title
        ];

        $categories = $this->getCategories();

        return view('site.projects.show', compact('item', 'sharerUrl', 'categories', 'nextProject', 'prevProject'));
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

            $item = Product::enabled()->withCount('thumbsUp')->lockForUpdate()->findOrFail($id);

            $query = $item->likes()->where(function ($query) use ($request) {
                return \Auth::check()
                    ? $query->orWhere('user_id', \Auth::id())
                    : $query->whereNull('user_id')->where('user_ip', $request->getClientIp());
            });

            if (!$query->exists()) {
                $item->likes()->create([
                    'user_id' => \Auth::check() ? \Auth::id() : null,
                    'user_ip' => $request->getClientIp(),
                    'score_type' => ELikeType::thumbs_up,
                    'state' => 1
                ]);

                // $item->increment('likes_count');

                \DB::commit();

                return response()->json([
                    'status' => 'success',
                    'message' => trans('site.projects.comment_liked'),
                    'likes_count' => $item->thumbs_up_count + 1
                ]);
            }

            // If user has voted before, remove his vote
            $query->delete();

            // $item->decrement('likes_count');

            \DB::commit();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.projects.you_took_your_vote_back'),
                'likes_count' => $item->thumbs_up_count - 1
            ]);

        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => trans('site.projects.vote_submit_error'),
            ], 400);
        }
    }

    private function getCategories()
    {
        $root = Category::find(3);
        $categoryItems = $root->getDescendants();
        return $this->recursiveNestable($categoryItems->toArray(), $root->id);
    }

    protected function recursiveNestable($elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->recursiveNestable($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
