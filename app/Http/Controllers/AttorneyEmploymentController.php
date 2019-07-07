<?php

namespace App\Http\Controllers;

use App\AttorneyEmployment;
use App\Forms\Site\AttorneyEmploymentForm;
use App\Http\Requests\Site\StoreAttorneyEmploymentRequest;
use App\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class AttorneyEmploymentController extends Controller
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
            ->where('page_name', 'attorney_form')
            ->first();
        $attorneyEmployment = new AttorneyEmployment();
        $form = $formBuilder->create(AttorneyEmploymentForm::class, [
            'method' => 'POST',
            'url' => route('site.attorneyEmployment.store'),
            'model' => $attorneyEmployment
        ]);


        return view('site.attorneyEmployment.form', compact('form', 'content'));

    }

    /**
     * Store AttorneyEmployment form.
     * @param StoreAttorneyEmploymentRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreAttorneyEmploymentRequest $request)
    {
        try {
            $data = $request->except(['submit', '_token', 'g-recaptcha-response']);
            $data['description'] = $data['resume'];

            $data['read'] = 0;
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    public_path() . AttorneyEmployment::imagePath(), $imageName
                );

                $data['image'] = $img->getFilename();
            }

            AttorneyEmployment::create($data);
            Flash::info(trans('site.attorneyEmployment.message.your_employee_request_has_been_sent_successfully'));
            return redirect()->to(route('site.attorneyEmployment.create'));
        } catch (\Exception $exception) {
            Flash::danger(trans('site.attorneyEmployment.message.your_request_has_been_failed'));
            return redirect()->to(route('site.attorneyEmployment.create'));
        }
    }
}
