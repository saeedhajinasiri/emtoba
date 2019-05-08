<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Forms\Admin\BlogForm;
use App\Media;
use App\Blog;
use App\Tag;
use App\Http\Requests\Admin\StoreBlogRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class BlogController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'blog';
    protected $form = BlogForm::class;
    protected $model;
    protected $single = 'blog';
    protected $type = 'blog';
    protected $relative_path;

    public function __construct(Blog $model)
    {
        $this->relative_path = Blog::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all blog with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Blog::with('user')->orderBy('id', 'DESC')->paginate(10);

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
                'method' => 'blog'
            ]);

            return view('admin.' . $this->section . '.form', compact('form'))->with('section', $this->type);
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlogRequest $request)
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
     * @param Blog $blog
     * @param StoreBlogRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Blog $blog, StoreBlogRequest $request)
    {
        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

        $input['slug'] = $this->slugify($input['slug']);

        if ($request->hasFile('image')) {
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $img = $request->file('image')->move(
                $this->path, $imageName
            );

            $input['image'] = $img->getFilename();
            if (\File::isFile(base_path() . '/public/images/blog/' . $blog->image)) {
                \File::delete(base_path() . '/public/images/blog/' . $blog->image);
            }
        }

        $blog->update($input);

        if ($request->tags_list) {
            $this->syncTags($blog, $request->tags_list);
        }

        if ($request->category_list) {
            $this->syncCategories($blog, $request->category_list);
        }

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.blog.edit', $blog->id);
    }

    /**
     * Sync up the list of menus in the database
     *
     * @param Blog $blog
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function uploadPhoto(Blog $blog, Request $request)
    {
        $user = \Auth::user();
        $gallery = array_first($request->file('galleries'));

        if ($gallery) {
            $mimeType = $gallery->getMimeType();
            $imageName = time() . $gallery->getClientOriginalName();
            $img = $gallery->move(
                $this->path, $imageName
            );

            $blog->media()->create([
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
     * @param Blog $blog
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     */
    protected function removePhoto(Blog $blog, Media $media)
    {
        if ($media) {
            if (File::isFile(public_path() . $this->relative_path . $media->name)) {
                File::delete(public_path() . $this->relative_path . $media->name);
            }
            $blog->media()->where('id', $media->id)->delete();

            return response()->json('حذف تصویر با موفقیت انجام شد.');
        }

        return response()->json('While deleting image an error was occurred', 403);
    }

    /**
     * firstOrCreate the list of tag in the database
     *
     * @param Blog $blog
     * @param array $tags
     */
    private function syncTags(Blog $blog, $tags)
    {
        foreach ($tags as $tagName) {
            $tagInfo = Tag::firstOrCreate(['title' => $tagName], ['title' => $tagName, 'slug' => $this->slugify($tagName)]);
            if ($tagInfo) {
                $tagIds[] = $tagInfo->id;
            }
        }
        if ($tagIds) {
            $blog->tags()->sync($tagIds);
        } else {
            $blog->tags()->detach();
        }
    }

    /**
     * Sync up the list of categories in the database
     *
     * @param Blog $blog
     * @param array $categories
     * @internal param categories $Array
     */
    private function syncCategories(Blog $blog, $categories = null)
    {
        if ($categories) {
            $blog->categories()->sync($categories);
        } else {
            $blog->categories()->detach();
        }
    }
}
