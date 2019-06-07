<?php

namespace App\Http\Controllers\Admin;


use App\Forms\Admin\RoleForm;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;
use Exception;

class RolesController extends AdminController
{
    protected $section = 'roles';
    protected $form = RoleForm::class;
    protected $model;

    /**
     * RolesController constructor.
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function store(StoreRoleRequest $request)
    {
        $input = $request->all();

        $item = $this->model->create($input);

        Flash::info(trans('admin.insert_is_successfully'));

        return $this->redirectToAction($request->get('action'), $item);
    }

    public function edit($id, FormBuilder $formBuilder)
    {
        try {
            $item = $this->model->findOrFail($id);
            $form = $formBuilder->create(RoleForm::class, [
                'url' => route('admin.roles.update', $item->id),
                'method' => 'PUT',
                'model' => $item
            ]);

            $permissionsIdArray = $item->permissions()->pluck('id')->toArray();
            $permissionGroups = Permission::get()->groupBy('prefix');
        } catch (Exception $exception) {
            return $this->returnWithError($exception->getMessage());
        }

        return view('admin.roles.form', compact('form', 'item', 'permissionGroups', 'permissionsIdArray'));
    }

    public function update(Role $role, StoreRoleRequest $request)
    {
        $input = $request->all();
        $role->update($input);

        $role->permissions()->sync($input['permissions']);
        Cache::forget('entrust_permissions_for_role_' . $role->id);

        Flash::info(trans('admin.update_is_successfully'));

        return $this->redirectToAction($request->get('action'), $role);
    }
}
