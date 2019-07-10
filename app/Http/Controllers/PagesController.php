<?php

namespace App\Http\Controllers;

use App\About;
use App\Client;
use App\Enums\EState;
use App\Page;
use App\Setting;
use App\Team;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function about(Request $request)
    {
        $abouts = About::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'ASC')
            ->get();

        $page = Page::query()
            ->whereIn('page_name', ['about_page'])
            ->first();

        return view('site.pages.about', compact('page', 'abouts'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function clients(Request $request)
    {
        $page = Page::query()
            ->where('page_name', 'clients_page')
            ->first();;

        return view('site.clients.show', compact('page'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function statute(Request $request)
    {
        $page = Page::query()
            ->where('page_name', 'statute_page')
            ->first();

        return view('site.pages.show', compact('page'));
    }

}
