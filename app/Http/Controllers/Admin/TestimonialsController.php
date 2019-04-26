<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use App\Forms\Admin\TestimonialForm;
use App\Http\Requests\StoreTestimonialsRequest;
use Exception;
use Laracasts\Flash\Flash;

class TestimonialsController extends AdminController
{
    protected $section = 'testimonials';
    protected $single = 'testimonial';
    protected $form = TestimonialForm::class;
    protected $model;
    protected $path;

    public function __construct(Testimonial $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreTestimonialsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTestimonialsRequest $request)
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

            $testimonial = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $testimonial);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Testimonial $testimonial
     * @param StoreTestimonialsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Testimonial $testimonial, StoreTestimonialsRequest $request)
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
                if (\File::isFile($this->path . $testimonial->image)) {
                    \File::delete($this->path . $testimonial->image);
                }
            }

            $testimonial->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $testimonial);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
