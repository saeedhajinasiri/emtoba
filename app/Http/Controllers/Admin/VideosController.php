<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\BlogForm;
use App\Post;
use App\Http\Requests\StorePostRequest;
use Exception;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class VideosController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'posts';
    protected $form = BlogForm::class;
    protected $model;
    protected $single = 'post';
    protected $type = 'videos';

    public function __construct(Post $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all videos with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Post::with('User')->whereType('video')->orderBy('id', 'DESC')->paginate(10);

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
                'url' => route('admin.videos.store'),
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
        $input['type'] = 'video';

        if ($request->hasFile('image')) {
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $img = $request->file('image')->move(
                $this->path, $imageName
            );

            $input['image'] = $img->getFilename();
        }

        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return redirect()->route('admin.videos.edit', $item->id);
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

            $form = $formBuilder->create($this->form, [
                'url' => route('admin.videos.update', $id),
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
     * @param $id
     * @param StorePostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $id, StorePostRequest $request)
    {
        $video = Post::firstOrFail($id);
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
        dd($video, $input);

        $video->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.videos.edit', $video->id);
    }
}
