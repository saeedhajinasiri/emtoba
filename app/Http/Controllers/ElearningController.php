<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Enums\EState;
use App\Forms\Site\ConcertForm;
use App\Http\Requests\Site\StoreConcertRequest;
use App\Lesson;
use App\Page;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ElearningController extends Controller
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
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function show()
    {
        return view('site.elearning.show');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function lessons()
    {
        $lessons = Lesson::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'DESC')
            ->get();

        return view('site.elearning.lessons', compact('lessons'));
    }
}
