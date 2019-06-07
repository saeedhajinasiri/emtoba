<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Forms\Site\EmployeeForm;
use App\Http\Requests\Site\StoreEmployeeRequest;
use App\Page;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class EmployeesController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @param FormBuilder $formBuilder
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function create(FormBuilder $formBuilder)
    {
        $content = Page::query()
            ->where('page_name', 'employee_form')
            ->first();
        $employee = new Employee();
        $form = $formBuilder->create(EmployeeForm::class, [
            'method' => 'POST',
            'url' => route('site.employees.store'),
            'model' => $employee
        ]);


        return view('site.employees.form', compact('form', 'content'));

    }

    /**
     * Store Employee form.
     * @param StoreEmployeeRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            $data = $request->except(['submit', '_token', 'g-recaptcha-response']);

            $data['read'] = 0;
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    public_path() . Employee::imagePath(), $imageName
                );

                $data['image'] = $img->getFilename();
            }

            Employee::create($data);
            Flash::info(trans('site.employees.message.your_employee_request_has_been_sent_successfully'));
            return redirect()->to(route('site.employees.create'));
        } catch (\Exception $exception) {
            Flash::danger(trans('site.employees.message.your_request_has_been_failed'));
            return redirect()->to(route('site.employees.create'));
        }
    }
}
