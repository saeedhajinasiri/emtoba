<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Enums\EInventoryStatus;
use App\Post;
use App\Enums\EState;
use App\Project;
use App\Setting;
use App\Like;
use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;

class BasketController extends Controller
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

    public function index()
    {
        $carts = Session::get('cart');

        $projects = Project::query()
            ->whereIn('id', collect($carts['projects'])->pluck('id')->toArray())
            ->where('state', EState::enabled)
            ->where('inventory_status', EInventoryStatus::existing)
            ->get();

        foreach ($carts['projects'] as $cart) {
            $project = $projects->where('id', $cart['id'])->first();
            if ($project->final_price != $cart['price']) {
                $cart['description'] = 'تغییراتی در قیمت این کالا ایجاد شده است';
                $cart['price'] = $project->final_price;
                $cart['discount'] = $project->price - $project->final_price;
                $cart['final_price'] = $project->final_price * $cart['quantity'];
            }
        }

        return view('site.basket.index', compact('projects', 'carts'));
    }

    /**
     * Add a project to basket.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function add($id)
    {
        $project = Project::query()
            ->whereId($id)
            ->where('state', EState::enabled)
            ->where('inventory_status', EInventoryStatus::existing)
            ->first();

        if (!$project) {
            Flash::info('site.projects.not_exist');
            return Redirect::back();
        }

        $this->addToBasket($project);

        return Redirect::to(route('site.basket.index'));
    }

    private function addToBasket($project)
    {
        $cart = Session::get('cart');
        $cartItem = array(
            "id" => $project->id,
            "project_name" => $project->title_fa,
            "manufacturing_country" => $project->manufacturing_country,
            "price" => $project->final_price,
            'discount' => $project->price - $project->final_price,
            "link" => $project->link,
            "image" => $project->image_link,
            "quantity" => 1,
            "final_price" => $project->final_price,
            "description" => ''
        );

        $cart['projects'][$project->id] = $cartItem;

        $cart['total_price'] = isset($cart['total_price']) ? $cart['total_price'] + $cartItem['final_price'] : $cartItem['final_price'];
        $cart['total_discount'] = isset($cart['total_discount']) ? $cart['total_discount'] + $cartItem['discount'] : $cartItem['discount'];
        $cart['shipping_price'] = 0; //isset($cart['shipping_price']) ? $cart['shipping_price'] + $cartItem['shipping_price'] : $cartItem['shipping_price'];

        Session::put('cart', $cart);
    }

    public function removeFromBasket($id)
    {
        $cart = Session::get('cart');

        if (isset($cart['projects'][$id])) {
            $cart['total_price'] = $cart['total_price'] - $cart['projects'][$id]['final_price'];
            $cart['total_discount'] = $cart['total_discount'] - $cart['projects'][$id]['discount'];
            $cart['shipping_price'] = 0;
            unset($cart['projects'][$id]);
        }

        Session::put('cart', $cart);
        return Redirect::to(route('site.basket.index'));
    }
}
