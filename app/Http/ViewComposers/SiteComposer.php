<?php

namespace App\Http\ViewComposers;

use App\Category;
use App\Enums\ELinkType;
use App\Enums\EState;
use App\Link;
use App\Menu;
use App\Menus\AdminMenu;
use App\Post;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class SiteComposer
{
    protected $routeName;
    protected $parentRoute;
    protected $parentRouteName;
    protected $user;
    protected $menus;
    protected $site_title;
    protected $settings;
    protected $footerLinks;
    protected $siteMenus;
    protected $current_uri;

    public function __construct()
    {
        $this->routeName = Route::currentRouteName();

        $this->user = Auth::user();

        $this->settings = Cache::rememberForever('siteSettings', function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });
        $this->site_title = $this->settings['site_title'];

        $this->footerLinks = Link::query()
            ->where('state', EState::enabled)
            ->where('type', ELinkType::footer)
            ->orderBy('id', 'DESC')
            ->get();

        $this->current_uri = Route::current()->uri;

        $root = Menu::root();
        $menuItems = $root->getDescendants();
        $this->siteMenus = $this->recursiveNestable($menuItems->toArray(), $root->id);
    }

    public function compose($view)
    {
        $view->with([
            'site_title' => $this->site_title,
            'title' => $this->routeName,
            'user' => $this->user,
            'settings' => $this->settings,
            'footerLinks' => $this->footerLinks,
            'siteMenus' => $this->siteMenus,
            'current_uri' => $this->current_uri,
        ]);
    }

    protected function recursiveNestable($elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->recursiveNestable($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}