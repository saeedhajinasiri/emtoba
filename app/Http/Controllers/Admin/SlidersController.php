<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use App\Forms\Admin\SliderForm;
use App\Http\Requests\Admin\StoreSlidersRequest;
use Exception;
use Laracasts\Flash\Flash;

class SlidersController extends AdminController
{
    protected $section = 'sliders';
    protected $single = 'slider';
    protected $form = SliderForm::class;
    protected $model;
    protected $path;

    public function __construct(Slider $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreSlidersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSlidersRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            $slider = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $slider);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Slider $slider
     * @param StoreSlidersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Slider $slider, StoreSlidersRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            $slider->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $slider);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
