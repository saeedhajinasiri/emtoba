<?php

namespace App\Http\Controllers;

use App\Client;
use App\Enums\EState;
use App\Page;
use App\Setting;
use App\Team;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostsController extends Controller
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
        $pages = Page::query()
            ->whereIn('page_name', ['about', 'our_team', 'testimonial_page'])
            ->get()
            ->keyBy('page_name');

        $teams = Team::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'ASC')
            ->get();

        $testimonials = Testimonial::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'ASC')
            ->get();

        $settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return view('site.about.show', compact('pages', 'testimonials', 'teams', 'settings'));
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
            ->first();

        $clients = Client::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'ASC')
            ->get();

        return view('site.clients.show', compact('page', 'clients'));
    }
}
