<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Job;
use App\Partner;
use App\Forms\Admin\PartnerForm;
use App\Http\Requests\Admin\StorePartnersRequest;
use Exception;
use Laracasts\Flash\Flash;

class PartnersController extends AdminController
{

    protected $section = 'partners';
    protected $single = 'partner';
    protected $form = PartnerForm::class;
    protected $model;
    protected $path;
    protected $relative_path;

    public function __construct(Partner $model)
    {
        $this->relative_path = Partner::imagePath();
        $this->path = public_path() . $this->relative_path;
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StorePartnersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePartnersRequest $request)
    {
        try {
            $input = $request->all();

            if (!$request->get('state')) {
                $input['state'] = 0;
            }

            if ($input['job_list']) {
                $jobId = Job::firstOrCreate(['title' => $input['job_list']], ['title' => $input['job_list']]);
                $input['job_id'] = $jobId->id;
            }

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
            }

            $partner = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $partner);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Partner $partner
     * @param StorePartnersRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Partner $partner, StorePartnersRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            if ($input['job_list']) {
                $jobId = Job::firstOrCreate(['title' => $input['job_list']], ['title' => $input['job_list']]);
                $input['job_id'] = $jobId->id;
            }

            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    $this->path, $imageName
                );

                $input['image'] = $img->getFilename();
                if (\File::isFile($this->path . $partner->image)) {
                    \File::delete($this->path . $partner->image);
                }
            }

            $partner->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $partner);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
