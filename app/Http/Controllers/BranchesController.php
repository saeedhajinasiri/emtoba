<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Client;
use App\Enums\EState;
use App\Page;
use App\Setting;
use App\Team;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BranchesController extends Controller
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
    public function index(Request $request)
    {
        $branches = Branch::query()
            ->whereState(EState::enabled)
            ->orderBy('id', 'ASC')
            ->get();

        return view('site.pages.branches', compact('branches'));
    }
}
