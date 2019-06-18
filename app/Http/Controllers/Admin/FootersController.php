<?php

namespace App\Http\Controllers\Admin;

use App\Footer;
use App\Forms\Admin\FooterForm;
use App\Http\Requests\Admin\StoreFootersRequest;
use Exception;
use Laracasts\Flash\Flash;

class FootersController extends AdminController
{
    protected $section = 'footers';
    protected $single = 'footer';
    protected $form = FooterForm::class;
    protected $model;
    protected $path;
    protected $relative_path;

    public function __construct(Footer $model)
    {
        $this->relative_path = Footer::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreFootersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFootersRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

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

            $footer = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $footer);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Footer $footer
     * @param StoreFootersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Footer $footer, StoreFootersRequest $request)
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
                if (\File::isFile($this->path . $footer->image)) {
                    \File::delete($this->path . $footer->image);
                }
            }

            $footer->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $footer);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
