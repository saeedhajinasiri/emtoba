<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\Forms\Admin\PageForm;
use App\Http\Requests\StorePagesRequest;
use Exception;
use Laracasts\Flash\Flash;

class PagesController extends AdminController
{
    protected $section = 'pages';
    protected $single = 'page';
    protected $form = PageForm::class;
    protected $model;
    protected $path;

    public function __construct(Page $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        try {
            $items = $this->model->whereNull('page_name')->orderBy('id', 'DESC')->paginate(10);

            return view('admin.' . $this->section . '.index', compact('items'));
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }
    }

    /**
     * @param StorePagesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePagesRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $input['slug'] = $this->slugify($input['slug']);

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $page = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $page);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Page $page
     * @param StorePagesRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Page $page, StorePagesRequest $request)
    {
        try {
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
                if (\File::isFile($this->path . $page->image)) {
                    \File::delete($this->path . $page->image);
                }
            }
            $page->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $page);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
