<?php

namespace App\Http\Controllers;

use App\Enums\ECommentType;
use App\Enums\ELinkType;
use App\Enums\EState;
use App\Link;
use App\Page;
use App\Post;
use App\Comment;
use App\Http\Requests\Site\StoreCommentRequest;
use App\Setting;
use App\Slider;
use App\Traits\ModelFunctions;
use Carbon\Carbon;
use Laracasts\Flash\Flash;

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
            ->where('state', EState::enabled)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'DESC')
            ->get();

        $partners = Link::query()
            ->where('state', EState::enabled)
            ->where('type', ELinkType::partners)
            ->orderBy('id', 'DESC')
            ->get();

        $governments = Link::query()
            ->where('state', EState::enabled)
            ->where('type', ELinkType::governmental)
            ->orderBy('id', 'DESC')
            ->get();

        $certificates = Link::query()
            ->where('state', EState::enabled)
            ->where('type', ELinkType::certificate)
            ->orderBy('id', 'DESC')
            ->get();

        $news = Post::query()
            ->where('published_at', '<=', Carbon::now())
            ->where('featured', 1)
            ->enabled()
            ->orderBy('published_at', 'DESC')
            ->take(3)
            ->get();

        return view('site.home', compact('settings', 'sliders', 'partners', 'governments', 'certificates', 'news'));
    }

    public function commentCreate(StoreCommentRequest $request, $id, $model)
    {
        try {
            $item = app('\App\\' . ucfirst($model))->findOrFail($id);

            $comment = new Comment();
            $comment->title = '';
            $comment->content = $request->input('content');
            $comment->user_ip = $request->ip();
            $comment->status = ECommentType::pending;
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
//            dd($comment);

            Flash::info(trans('site.site.comments.comment_created_successfully_and_needs_to_be_approved'));
            return redirect()->back();
        } catch (\Exception $e) {
            Flash::error(trans('site.site.comments.comment_failed'));
            return redirect()->back();
        }
    }

    protected function getModel($type, $id)
    {
        $class = "App\\" . ucfirst(str_singular($type));

        return $class::findOrFail($id);
    }
}
