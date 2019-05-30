<?php

namespace App\Http\Controllers;

use App\Camp;
use App\Forms\Site\CampForm;
use App\Http\Requests\Site\StoreCampRequest;
use App\Page;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class CampsController extends Controller
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
            ->where('page_name', 'camp_form')
            ->first();

        $camp = new Camp();
        $form = $formBuilder->create(CampForm::class, [
            'method' => 'POST',
            'url' => route('site.camps.store'),
            'model' => $camp
        ]);


        return view('site.camps.form', compact('form', 'content'));

    }

    /**
     * Store Camp form.
     * @param StoreCampRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreCampRequest $request)
    {
        try {
            $data = $request->except(['submit', '_token', 'captcha']);

            $data['read'] = 0;
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    public_path() . Camp::imagePath(), $imageName
                );

                $data['image'] = $img->getFilename();
            }

            Camp::create($data);

            Flash::info(trans('site.camps.message.your_camp_request_has_been_sent_successfully'));
            return redirect()->to(route('site.camps.create'));
        } catch (\Exception $exception) {
            Flash::error(trans('site.camps.message.your_request_has_been_failed'));
            return redirect()->to(route('site.camps.create'));
        }
    }
}
