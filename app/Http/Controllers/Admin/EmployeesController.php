<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Contact;
use App\Forms\Admin\EmployeeForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;
use Mockery\CountValidator\Exception;

class EmployeesController extends AdminController
{
    protected $section = 'employees';
    protected $single = 'employee';
    protected $form = EmployeeForm::class;
    protected $model;
    protected $path;

    public function __construct(Employee $model)
    {
        $this->model = $model;
        parent::__construct();
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

            $item->update([
                'read' => 1
            ]);

            $form = $formBuilder->create($this->form, [
                'url' => route('admin.employees.update', $id),
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
     * @param Contact $contact
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Contact $contact, Request $request)
    {
        try {
            $input = $request->only('read');
            $input['updated_by'] = \Auth::id();

            $contact->update($input);

            Flash::info(trans('admin.update_is_successfully'));

            return $this->redirectToAction($request->get('action'), $contact);

        } catch (Exception $exception) {
            return Flash::error($exception->getMessage());
        }
    }
}
