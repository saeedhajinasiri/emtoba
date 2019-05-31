<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Enums\EState;
use App\Partner;
use Illuminate\Http\Request;

class PartnersController extends Controller
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
        $partnersRaw = Partner::query()
            ->with('job')
            ->whereState(EState::enabled)
            ->orderBy('row', 'ASC')
            ->orderBy('column', 'ASC')
            ->get();

        foreach($partnersRaw as $partner) {
            $partners[$partner->row][] = $partner;
        }

        return view('site.pages.partners', compact('partners'));
    }
}
