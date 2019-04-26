<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Forms\Admin\DepartmentForm;
use App\Http\Requests\StoreDepartmentsRequest;
use Exception;
use Laracasts\Flash\Flash;

class DepartmentsController extends AdminController
{
    protected $section = 'departments';
    protected $single = 'department';
    protected $form = DepartmentForm::class;
    protected $model;
    protected $path;

    public function __construct(Department $model)
    {
        $this->path = base_path() . '/public/images/' . $this->single . '/';
        $this->model = $model;
        parent::__construct();
    }

    /**
     * @param StoreDepartmentsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDepartmentsRequest $request)
    {
        try {
            $input = $request->all();

            $userId = \Auth::id();
            $input['created_by'] = $userId;
            $input['updated_by'] = $userId;

            $department = $this->model->create($input);

            Flash::info(trans('admin.insert_is_successfully'));

            return $this->redirectToAction($request->get('action'), $department);
        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Department $department
     * @param StoreDepartmentsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Department $department, StoreDepartmentsRequest $request)
    {
        try {
            $input = $request->all();
            if (!isset($input['state'])) {
                $input['state'] = 0;
            }

            $department->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $department);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
