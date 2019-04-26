<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Brand;
use App\Enums\EInventoryStatus;
use App\Enums\EState;
use App\Enums\ETradeType;
use App\Page;
use App\Post;
use App\Product;
use App\Restaurant;
use App\Comment;
use App\Education;
use App\Experience;
use App\Http\Requests\StoreCommentRequest;
use App\Setting;
use App\Skill;
use App\Slider;
use App\Traits\ModelFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use ModelFunctions;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();

        $sliders = Slider::query()
            ->whereState(EState::enabled)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'DESC')
            ->take(6)
            ->get();

        $about = Page::query()
            ->where('page_name', 'about')
            ->first();

        $news = Post::query()
            ->where('published_at', '<=', Carbon::now())
            ->where('featured', 1)
            ->enabled()
            ->whereType('news')
            ->orderBy('published_at', 'DESC')
            ->take(2)
            ->get();

        $videoItem = Post::query()
            ->where('published_at', '<=', Carbon::now())
            ->where('featured', 1)
            ->enabled()
            ->whereType('video')
            ->orderBy('published_at', 'DESC')
            ->first();

        return view('site.home', compact('settings', 'sliders', 'about', 'news', 'videoItem'));
    }

    public function commentCreate(StoreCommentRequest $request, $id, $model)
    {

        // try {
            $item = app('\App\\' . ucfirst($model))->findOrFail($id);

            $comment = new Comment();
            $comment->content = $request->input('content');
            $comment->user_ip = $request->ip();
            $comment->status = Comment::pending;
            $comment->state = 1;
            $comment->created_by = \Auth::id();
            $comment->updated_by = \Auth::id();

            // Check User is Authenticated
            if (\Auth::check()) {
                $user = \Auth::user();
                $comment->user_id = $user->id;
                $comment->user_name = $user->full_name;
                $comment->user_email = $user->email;
                $comment->user_website = $user->website;
            } else {
                $comment->user_name = $request->input('user_name');
                $comment->user_email = $request->input('user_email');
                $comment->user_website = $request->input('user_website');
                $comment->created_by = 1;
                $comment->updated_by = 1;
            }

            // Check Comment Parent
            if ($request->has('parent_id') && strlen($request->input('parent_id')) > 0) {
                $parent = Comment::findOrFail($request->input('parent_id'));
                $comment->parent_id = is_null($parent->parent_id) ? $request->input('parent_id') : $parent->parent_id;
            }

            $item->comments()->save($comment);

            return response()->json([
                'status' => 'success',
                'message' => trans('site.site.comments.comment_created_successfully_and_needs_to_be_approved'),
            ]);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => trans('site.site.comments.comment_failed'),
        //     ], 400);
        // }
    }

    protected function getModel($type, $id)
    {
        $class = "App\\" . ucfirst(str_singular($type));

        return $class::findOrFail($id);
    }
}
