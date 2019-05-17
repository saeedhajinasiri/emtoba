<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'admin.master', 'App\Http\ViewComposers\AdminComposer'
        );
        View::composer(
            ['site.main', 'site.home', 'partials.footer'], 'App\Http\ViewComposers\SiteComposer'
        );
        View::composer(
            ['site.search'], 'App\Http\ViewComposers\SearchComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
