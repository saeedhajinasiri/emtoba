<?php

namespace App\Http\Controllers;

use App\Advertise;
use App\Enums\ETradeType;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SearchController extends Controller
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
        $tradeType = null;
        if (in_array("local_{$request->get('action')}", ETradeType::flipArray())) {
            $tradeType = ETradeType::toArray()["local_{$request->get('action')}"];
        }

        $amount = null;
        if ($request->has('amount')) {
            $amount = $request->get('amount');
        }

        $currency = null;
        if ($request->has('currency_type')) {
            $currency = $request->get('currency_type');
        }

        $location = null;
        if ($request->has('location_id')) {
            $location = $request->get('location_id');
        }

        $paymentMethod = null;
        if ($request->has('payment_method')) {
            $paymentMethod = $request->get('payment_method');
        }

        $items = Advertise::query()
            ->when($tradeType, function ($query) use ($tradeType) {
                return $query->where('trade_type', $tradeType);
            })
            ->when($amount, function ($query) use ($amount) {
                return $query->where('min_amount', '<=', $amount)
                    ->where('max_amount', '>=', $amount);
            })
            ->when($currency, function ($query) use ($currency) {
                return $query->where('currency_type', $currency);
            })
            ->when($location, function ($query) use ($location) {
                return $query->where(function ($query) use ($location) {
                    $query->where('location_id', $location)
                        ->orWhere('location_path', 'LIKE', '%-' . $location . '-%');
                });
            })
            ->when($paymentMethod, function ($query) use ($paymentMethod) {
                return $query->where('payment_method', $paymentMethod);
            })
            ->valid()
            ->paginate(10);

        $settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        if (ETradeType::search($tradeType) == 'local_buy') {
            return view('site.ad.buy', compact('items', 'settings', 'content'));
        }

        return view('site.ad.sell', compact('items', 'settings', 'content'));
    }
}
