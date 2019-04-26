<?php

namespace App\Http\ViewComposers;

use App\Enums\EState;
use App\Forms\Site\SearchForm;
use App\Link;
use App\Menus\AdminMenu;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilder;

class SearchComposer
{
    protected $routeName;
    protected $parentRoute;
    protected $parentRouteName;
    protected $user;
    protected $menus;
    protected $site_title;
    protected $settings;
    protected $footerLinks;
    protected $searchForm;

    public function __construct(FormBuilder $formBuilder)
    {
        $this->searchForm = $formBuilder->create(SearchForm::class, [
            'method' => 'GET',
            'url' => route('site.search.index'),
        ]);
    }

    public function compose($view)
    {
        $view->with([
            'searchForm' => $this->searchForm,
        ]);
    }
}