<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Forms\Site\ConcertForm;
use App\Http\Requests\Site\StoreConcertRequest;
use App\Page;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ConcertsController extends Controller
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
            ->where('page_name', 'concert_form')
            ->first();

        $concert = new Concert();
        $form = $formBuilder->create(ConcertForm::class, [
            'method' => 'POST',
            'url' => route('site.concerts.store'),
            'model' => $concert
        ]);


        return view('site.concerts.form', compact('form', 'content'));

    }

    /**
     * Store Concert form.
     * @param StoreConcertRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreConcertRequest $request)
    {
        try {
            $data = $request->except(['submit', '_token', 'captcha']);

            $data['read'] = 0;
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    public_path() . Concert::imagePath(), $imageName
                );

                $data['image'] = $img->getFilename();
            }

            Concert::create($data);

            Flash::info(trans('site.concerts.message.your_concert_request_has_been_sent_successfully'));
            return redirect()->to(route('site.concerts.create'));
        } catch (\Exception $exception) {
            Flash::error(trans('site.concerts.message.your_request_has_been_failed'));
            return redirect()->to(route('site.concerts.create'));
        }
    }
}
