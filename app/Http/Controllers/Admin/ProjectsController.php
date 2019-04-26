<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Media;
use App\Project;
use App\Forms\Admin\ProjectForm;
use App\Http\Requests\StoreProjectsRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ProjectsController extends AdminController
{
    protected $section = 'projects';
    protected $single = 'project';
    protected $form = ProjectForm::class;
    protected $model;
    protected $path;
    protected $relative_path;

    public function __construct(Project $model)
    {
        $this->relative_path = Project::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreProjectsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProjectsRequest $request)
    {
        try {
            $input = $request->except(['_token', 'action']);

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $userId = \Auth::id();
            $input['author_id'] = $userId;
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            if ($request->hasFile('video_cover')) {
                $imageName = time() . $request->file('video_cover')->getClientOriginalName();
                $img = $request->file('video_cover')->move(
                    $this->path, $imageName
                );

                $input['video_cover'] = $img->getFilename();
            }

            $input['slug'] = $this->slugify($input['slug']);

            $project = $this->model->create($input);

            if ($request->category_list) {
                $this->syncCategories($project, $request->category_list);
            }

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $project);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
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

            $form = $formBuilder->create($this->form, [
                'url' => route('admin.' . $this->section . '.update', $id),
                'method' => 'put',
                'model' => $item
            ]);

        } catch (Exception $e) {
            return $this->returnWithError($e->getMessage());
        }

        return view('admin.' . $this->section . '.form', compact('form', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Project $project
     * @param StoreProjectsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Project $project, StoreProjectsRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }
            if (!isset($input['featured'])) {
                $input['featured'] = 0;
            }

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }
            if ($request->hasFile('video_cover')) {
                $imageName = time() . $request->file('video_cover')->getClientOriginalName();
                $img = $request->file('video_cover')->move(
                    $this->path, $imageName
                );

                $input['video_cover'] = $img->getFilename();
            }

            $input['slug'] = $this->slugify($input['slug']);

            $project->update($input);

            if ($request->category_list) {
                $this->syncCategories($project, $request->category_list);
            }

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $project);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Sync up the list of menus in the database
     *
     * @param Project $project
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function uploadPhoto(Project $project, Request $request)
    {
        $user = Auth::user();
        $gallery = array_first($request->file('galleries'));

        if ($gallery) {
            $mimeType = $gallery->getMimeType();
            $imageName = time() . $gallery->getClientOriginalName();
            $img = $gallery->move(
                $this->path, $imageName
            );

            $project->media()->create([
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
     * @param Project $project
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     */
    protected function removePhoto(Project $project, Media $media)
    {
        if ($media) {
            if (File::isFile(public_path() . $this->relative_path . $media->name)) {
                File::delete(public_path() . $this->relative_path . $media->name);
            }
            $project->media()->where('id', $media->id)->delete();

            return response()->json('حذف تصویر با موفقیت انجام شد.');
        }

        return response()->json('While deleting image an error was occurred', 403);
    }

    /**
     * Sync up the list of categories in the database
     *
     * @param Project $project
     * @param array $categories
     * @internal param categories $Array
     */
    private function syncCategories(Project $project, $categories = null)
    {
        if ($categories) {
            $project->categories()->sync($categories);
        } else {
            $project->categories()->detach();
        }
    }
}
