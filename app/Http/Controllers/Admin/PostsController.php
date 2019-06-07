<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Forms\Admin\PostForm;
use App\Media;
use App\Post;
use App\Tag;
use App\Http\Requests\Admin\StorePostRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class PostsController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'posts';
    protected $form = PostForm::class;
    protected $model;
    protected $single = 'post';
    protected $type = 'posts';
    protected $relative_path;

    public function __construct(Post $model)
    {
        $this->relative_path = Post::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all posts with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Post::with('user')->orderBy('id', 'DESC')->paginate(10);

        return view('admin.' . $this->section . '.index', compact('items'))->with('section', $this->type);
    }

    /**
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        try {
            $form = $formBuilder->create($this->form, [
                'url' => route('admin.' . $this->section . '.store'),
                'method' => 'post'
            ]);

            return view('admin.' . $this->section . '.form', compact('form'))->with('section', $this->type);
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePostRequest $request)
    {
        $input = $request->all();

        $userId = \Auth::id();
        $input['author_id'] = $userId;
        $input['created_by'] = $userId;
        $input['updated_by'] = $userId;

        $input['slug'] = $this->slugify($input['slug']);

        if ($request->hasFile('image')) {
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $img = $request->file('image')->move(
                $this->path, $imageName
            );

            $input['image'] = $img->getFilename();
        }

        $item = $this->model->create($input);

        if ($request->tags_list) {
            $this->syncTags($item, $request->tags_list);
        }

        if ($request->category_list) {
            $this->syncCategories($item, $request->category_list);
        }

        Flash::info(trans('admin.insert_is_successfully'));

        return redirect()->route('admin.' . $this->type . '.edit', $item->id);
    }

    /**
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        try {
            $item = $this->model->findOrFail($id);
            $item->category_list = $item->categories()->pluck('category_id')->toArray();
            $item->tags_list = $item->tags()->pluck('title')->toArray();

            $form = $formBuilder->create($this->form, [
                'url' => route('admin.' . $this->section . '.update', $id),
                'method' => 'put',
                'model' => $item
            ]);

        } catch (Exception $e) {
            return $this->returnWithError($e->getMessage());
        }

        return view('admin.' . $this->section . '.form', compact('form', 'item'))->with('section', $this->type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Post $post
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post, StorePostRequest $request)
    {
        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }
        if (!isset($input['featured'])) {
            $input['featured'] = 0;
        }
        if (!isset($input['has_comment'])) {
            $input['has_comment'] = 0;
        }

        $input['slug'] = $this->slugify($input['slug']);

        if ($request->hasFile('image')) {
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $img = $request->file('image')->move(
                $this->path, $imageName
            );

            $input['image'] = $img->getFilename();
            if (\File::isFile($this->path . $post->image)) {
                \File::delete($this->path . $post->image);
            }
        }

        $post->update($input);

        if ($request->tags_list) {
            $this->syncTags($post, $request->tags_list);
        }

        if ($request->category_list) {
            $this->syncCategories($post, $request->category_list);
        }

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.posts.edit', $post->id);
    }

    /**
     * Sync up the list of menus in the database
     *
     * @param Post $post
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function uploadPhoto(Post $post, Request $request)
    {
        $user = \Auth::user();
        $gallery = array_first($request->file('galleries'));

        if ($gallery) {
            $mimeType = $gallery->getMimeType();
            $imageName = time() . $gallery->getClientOriginalName();
            $img = $gallery->move(
                $this->path, $imageName
            );

            $post->media()->create([
                'name' => $imageName,
                'path' => $this->path,
                'disk' => 'public',
                'url' => url($this->relative_path . $imageName),
                'mime_type' => $mimeType,
                'user_id' => $user->id,
                'created_by' => $user->id,
                'updated_by' => $user->id,
                'state' => EState::enabled,
                'approved_at' => Carbon::now(),
            ]);

            return response()->json('آپلود تصویر با موفقیت انجام شد.');
        }

        return response()->json('While upload image an error was occurred', 403);
    }

    /**
     * Remove media from the database
     *
     * @param Post $post
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     */
    protected function removePhoto(Post $post, Media $media)
    {
        if ($media) {
            if (File::isFile(public_path() . $this->relative_path . $media->name)) {
                File::delete(public_path() . $this->relative_path . $media->name);
            }
            $post->media()->where('id', $media->id)->delete();

            return response()->json('حذف تصویر با موفقیت انجام شد.');
        }

        return response()->json('While deleting image an error was occurred', 403);
    }

    /**
     * firstOrCreate the list of tag in the database
     *
     * @param Post $post
     * @param array $tags
     */
    private function syncTags(Post $post, $tags)
    {
        foreach ($tags as $tagName) {
            $tagInfo = Tag::firstOrCreate(['title' => $tagName], ['title' => $tagName, 'slug' => $this->slugify($tagName)]);
            if ($tagInfo) {
                $tagIds[] = $tagInfo->id;
            }
        }
        if ($tagIds) {
            $post->tags()->sync($tagIds);
        } else {
            $post->tags()->detach();
        }
    }

    /**
     * Sync up the list of categories in the database
     *
     * @param Post $post
     * @param array $categories
     * @internal param categories $Array
     */
    private function syncCategories(Post $post, $categories = null)
    {
        if ($categories) {
            $post->categories()->sync($categories);
        } else {
            $post->categories()->detach();
        }
    }
}
