<?php

namespace App\Http\Controllers;

use App\Match;
use App\Forms\Site\MatchForm;
use App\Http\Requests\Site\StoreMatchRequest;
use App\Page;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class MatchesController extends Controller
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
            ->where('page_name', 'match_form')
            ->first();

        $match = new Match();
        $form = $formBuilder->create(MatchForm::class, [
            'method' => 'POST',
            'url' => route('site.matches.store'),
            'model' => $match
        ]);


        return view('site.matches.form', compact('form', 'content'));

    }

    /**
     * Store Match form.
     * @param StoreMatchRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreMatchRequest $request)
    {
        try {
            $data = $request->except(['submit', '_token', 'captcha']);

            $data['read'] = 0;
            if ($request->hasFile('image')) {
                $imageName = time() . $request->file('image')->getClientOriginalName();
                $img = $request->file('image')->move(
                    public_path() . Match::imagePath(), $imageName
                );

                $data['image'] = $img->getFilename();
            }

            Match::create($data);

            Flash::info(trans('site.matches.message.your_match_request_has_been_sent_successfully'));
            return redirect()->to(route('site.matches.create'));
        } catch (\Exception $exception) {
            Flash::error(trans('site.matches.message.your_request_has_been_failed'));
            return redirect()->to(route('site.matches.create'));
        }
    }
}
