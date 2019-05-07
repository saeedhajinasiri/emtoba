<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Forms\Admin\VideoForm;
use App\Http\Requests\Admin\StoreVideoRequest;
use App\Tag;
use App\Video;
use App\Http\Requests\Admin\StoreVideoRequestRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class VideosController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'videos';
    protected $form = VideoForm::class;
    protected $model;
    protected $single = 'video';
    protected $type = 'videos';
    protected $relative_path;

    public function __construct(Video $model)
    {
        $this->relative_path = Video::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all Videos with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Video::with('user')->orderBy('id', 'DESC')->paginate(10);

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
     * @param StoreVideoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVideoRequest $request)
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
            $this->tagSynchronization($item, $request->tags_list);
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
            $item->tags_list = $item->tags()->pluck('tag_id')->toArray();

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
     * @param Video $video
     * @param StoreVideoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Video $video, StoreVideoRequest $request)
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
            if (\File::isFile(base_path() . '/public/images/video/' . $video->image)) {
                \File::delete(base_path() . '/public/images/video/' . $video->image);
            }
        }

        $video->update($input);

        if ($request->tags_list) {
            $this->tagSynchronization($video, $request->tags_list);
        }

        if ($request->category_list) {
            $this->syncCategories($video, $request->category_list);
        }

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.videos.edit', $video->id);
    }


    /**
     * firstOrCreate the list of tagd in the database
     *
     * @param Video $video
     * @param array $tags
     */
    private function tagSynchronization(Video $video, $tags)
    {
        foreach ($tags as $tagName) {
            $tagInfo = Tag::firstOrCreate(['title' => $tagName],['title' => $tagName,'slug' => $this->slugify($tagName)]);
            if($tagInfo) {
                $tagIds[] = $tagInfo->id;
            }
        }
        if ($tagIds) {
            $video->tags()->sync($tagIds);
        } else {
            $video->tags()->detach();
        }
    }


    /**
     * Sync up the list of categories in the database
     *
     * @param Video $video
     * @param array $categories
     * @internal param categories $Array
     */
    private function syncCategories(Video $video, $categories = null)
    {
        if ($categories) {
            $video->categories()->sync($categories);
        } else {
            $video->categories()->detach();
        }
    }
}
