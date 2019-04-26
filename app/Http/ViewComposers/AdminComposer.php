<?php

namespace App\Http\ViewComposers;

use App\Menus\AdminMenu;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AdminComposer
{
    protected $routeName;
    protected $parentRoute;
    protected $parentRouteName;
    protected $user;
    protected $menus;
    protected $site_title;

    public function __construct()
    {
        $this->routeName = Route::currentRouteName();

        if (strpos($this->routeName, 'create') || strpos($this->routeName, 'edit')) {
            $this->parentRoute = route('admin.' . explode('.', $this->routeName)[1] . '.index');
            $this->parentRouteName = trans('admin.' . explode('.', $this->routeName)[1] . '.index');
        }
        $this->site_title = Setting::where('key', 'site_title')->first()->value;
        $this->user = Auth::user();

        $this->menus = app(AdminMenu::class)->getMenus($this->user);
    }

    public function compose($view)
    {
        $view->with([
            'site_title' => $this->site_title,
            'title' => $this->routeName,
            'parentRoute' => $this->parentRoute,
            'parentRouteName' => $this->parentRouteName,
            'user' => $this->user,
            'menu' => $this->menus,
        ]);
    }
}