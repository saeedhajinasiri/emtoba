<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\GuideForm;
use App\Guide;
use App\Http\Requests\StoreGuideRequest;
use Laracasts\Flash\Flash;

class GuidesController extends AdminController
{
    protected $title;
    protected $path;
    protected $section = 'guides';
    protected $form = GuideForm::class;
    protected $model;
    protected $single = 'guide';

    public function __construct(Guide $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Show all guides with pagination
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $items = Guide::query()->orderBy('id', 'DESC')->paginate(10);

        return view('admin.' . $this->section . '.index', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGuideRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreGuideRequest $request)
    {
        $input = $request->all();

        $userId = \Auth::id();
        $input['created_by'] = $userId;
        $input['updated_by'] = $userId;

        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return redirect()->route('admin.guides.edit', $item->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Guide $guide
     * @param StoreGuideRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Guide $guide, StoreGuideRequest $request)
    {
        $input = $request->all();
        if (!isset($input['state'])) {
            $input['state'] = 0;
        }

        $input['slug'] = $this->slugify($input['slug']);

        $guide->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return redirect()->route('admin.guides.edit', $guide->id);
    }
}
