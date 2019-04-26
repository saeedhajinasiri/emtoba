<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Enums\ETradeType;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SellController extends Controller
{
    protected $settings;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Advertise::query()
            ->where('trade_type', ETradeType::local_sell)
            ->valid()
            ->paginate(10);

        $settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return view('site.ad.sell', compact('items', 'settings', 'content'));
    }
}
