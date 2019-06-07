<?php

namespace App\Http\Controllers\Admin;

use App\Enums\EState;
use App\Job;
use App\Partner;
use App\Forms\Admin\PartnerForm;
use App\Http\Requests\Admin\StorePartnersRequest;
use Exception;
use Kris\LaravelFormBuilder\FormBuilder;
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
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        try {
            $row = Partner::query()
                ->orderBy('row', 'DESC')
                ->first();

            $partner = new Partner();
            if ($row) {
                $partner->row = $row->row;
            }
            $form = $formBuilder->create($this->form, [
                'url' => route('admin.' . $this->section . '.store'),
                'method' => 'post',
                'model' => $partner
            ]);

            return view('admin.' . $this->section . '.form', compact('form'));
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }
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
     * @param $id
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id, FormBuilder $formBuilder)
    {
        try {
            $item = $this->model->findOrFail($id);
            //print_r($item->job()->pluck('title')->toArray());die();
            $item->job_list = $item->job()->pluck('title');


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
            if (!isset($input['single'])) {
                $input['single'] = 0;
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
