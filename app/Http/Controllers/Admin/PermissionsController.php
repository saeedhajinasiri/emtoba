<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\PermissionForm;
use App\Http\Requests\StorePermissionRequest;
use App\Permission;
use Laracasts\Flash\Flash;

class PermissionsController extends AdminController
{
    protected $section = 'permissions';
    protected $form = PermissionForm::class;
    protected $model;

    /**
     * RolesController constructor.
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePermissionRequest $request)
    {
        $input = $request->all();
        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return $this->redirectToAction($request->get('action'), $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePermissionRequest $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Permission $permission, StorePermissionRequest $request)
    {
        $input = $request->all();
        $permission->update($input);

        Flash::info(trans('admin.update_is_successfully'));

        return $this->redirectToAction($request->get('action'), $permission);
    }
}
