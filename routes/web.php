<?php

use App\Setting;
use Illuminate\Support\Facades\Cache;

function getSetting($key) {
    return Cache::get('settings.' . $key, function () use ($key) {
        return Setting::query()
            ->where('key', $key)
            ->first()->toArray()['value'];
    });
}

/*
 * Route of sites
 */
Route::get('/about', ['as' => 'site.about.show', 'uses' => 'PagesController@about']);
Route::get('/clients', ['as' => 'site.clients.show', 'uses' => 'PagesController@clients']);

Route::get('/contacts', ['as' => 'site.contacts.create', 'uses' => 'ContactsController@create']);
Route::post('/contacts', ['as' => 'site.contacts.store', 'uses' => 'ContactsController@store']);

Route::get('/videos', ['as' => 'site.videos.index', 'uses' => 'VideosController@index']);

Route::get('/blog', ['as' => 'site.blog.index', 'uses' => 'BlogController@index']);
Route::get('blog/{id}', ['uses' => 'BlogController@show'])->where('id', '[0-9]+');
Route::get('blog/{id}-', ['uses' => 'BlogController@show'])->where('id', '[0-9]+');
Route::get('blog/{id}-{slug}', ['as' => 'site.blog.show', 'uses' => 'BlogController@show'])->where('id', '[0-9]+');

Route::get('/projects', ['as' => 'site.projects.index', 'uses' => 'ProjectsController@index']);
Route::get('projects/{id}', ['uses' => 'ProjectsController@show'])->where('id', '[0-9]+');
Route::get('projects/{id}-', ['uses' => 'ProjectsController@show'])->where('id', '[0-9]+');
Route::get('projects/{id}-{slug}', ['as' => 'site.projects.show', 'uses' => 'ProjectsController@show'])->where('id', '[0-9]+');
Route::get('/projects/{slug}', ['as' => 'site.projects.categories', 'uses' => 'ProjectsController@categories']);
Route::post('projects/like/{id}', [
    'as' => 'site.projects.like',
    'uses' => 'ProjectsController@like'
]);

Route::get('/', ['as' => 'site.index', 'uses' => 'SiteController@index']);

Route::post('/comments/{id}/{model}', ['as' => 'comment.create', 'uses' => 'SiteController@commentCreate']);

Auth::routes();
Route::any('logout', ['as' => 'logout', 'namespace' => 'Auth', 'uses' => 'Auth\LoginController@logout']);


/*
 * Route of Admins
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'RouteAuthorize'], 'namespace' => 'Admin'], function () {

    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
    Route::get('/databases', ['as' => 'databases.index', 'uses' => 'DatabasesController@index']);
    Route::get('/export', ['as' => 'databases.export', 'uses' => 'DatabasesController@export']);
    Route::post('/import', ['as' => 'databases.import', 'uses' => 'DatabasesController@import']);

    Route::resource('posts', 'PostsController');
    Route::post('posts/{post}/uploadPhoto', [
        'as' => 'posts.uploadPhoto',
        'uses' => 'PostsController@uploadPhoto'
    ]);
    Route::post('posts/{post}/removePhoto/{media}', [
        'as' => 'posts.removePhoto',
        'uses' => 'PostsController@removePhoto'
    ]);

    Route::resource('videos', 'VideosController');
    Route::resource('teams', 'TeamsController');
    Route::resource('testimonials', 'TestimonialsController');
    Route::resource('clients', 'ClientsController');
    Route::resource('comments', 'CommentsController');
    Route::resource('admins', 'AdminsController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('translations', 'TranslationsController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('pages', 'PagesController');
    Route::resource('links', 'LinksController');
    Route::resource('sliders', 'SlidersController');

//    Route::resource('categories', 'CategoriesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('projects', 'ProjectsController');
    Route::post('projects/{project}/uploadPhoto', [
        'as' => 'projects.uploadPhoto',
        'uses' => 'ProjectsController@uploadPhoto'
    ]);
    Route::post('projects/{project}/removePhoto/{media}', [
        'as' => 'projects.removePhoto',
        'uses' => 'ProjectsController@removePhoto'
    ]);
//    Route::resource('orders', 'OrdersController');

    Route::resource('customers', 'CustomersController');
    Route::get('customers/{id}/loginAs', [
        'as' => 'customers.loginAs',
        'uses' => 'CustomersController@loginAs'
    ]);

    // Categories route
    Route::get('categories/', [
        'as' => 'categories.index',
        'uses' => 'CategoriesController@tree'
    ]);
    Route::post('categories/sort', [
        'as' => 'categories.sort',
        'uses' => 'CategoriesController@sort'
    ]);
    Route::get('categories/{id}/quickEdit', [
        'as' => 'categories.quickEdit',
        'uses' => 'CategoriesController@quickEdit'
    ]);
    Route::put('categories/{id}/quickUpdate', [
        'as' => 'categories.quickUpdate',
        'uses' => 'CategoriesController@quickUpdate'
    ]);
    Route::get('categories/quickCreate', [
        'as' => 'categories.quickCreate',
        'uses' => 'CategoriesController@quickCreate'
    ]);
    Route::post('categories/quickStore', [
        'as' => 'categories.quickStore',
        'uses' => 'CategoriesController@quickStore'
    ]);
    Route::get('categories/{id}/quickDestroy', [
        'as' => 'categories.quickDestroy',
        'uses' => 'CategoriesController@quickDestroy'
    ]);
    // End of Categories route

    // Locations route
    Route::get('locations/', [
        'as' => 'locations.index',
        'uses' => 'LocationsController@tree'
    ]);
    Route::post('locations/sort', [
        'as' => 'locations.sort',
        'uses' => 'LocationsController@sort'
    ]);
    Route::get('locations/{id}/quickEdit', [
        'as' => 'locations.quickEdit',
        'uses' => 'LocationsController@quickEdit'
    ]);
    Route::put('locations/{id}/quickUpdate', [
        'as' => 'locations.quickUpdate',
        'uses' => 'LocationsController@quickUpdate'
    ]);
    Route::get('locations/quickCreate', [
        'as' => 'locations.quickCreate',
        'uses' => 'LocationsController@quickCreate'
    ]);
    Route::post('locations/quickStore', [
        'as' => 'locations.quickStore',
        'uses' => 'LocationsController@quickStore'
    ]);
    Route::get('locations/{id}/quickDestroy', [
        'as' => 'locations.quickDestroy',
        'uses' => 'LocationsController@quickDestroy'
    ]);
    // Route::resource('menus', 'MenusController');
    // End of locations route

    // Menus route
    /*Route::get('menus/', [
        'as' => 'menus.index',
        'uses' => 'MenusController@tree'
    ]);
    Route::post('menus/sort', [
        'as' => 'menus.sort',
        'uses' => 'MenusController@sort'
    ]);
    Route::get('menus/{id}/quickEdit', [
        'as' => 'menus.quickEdit',
        'uses' => 'MenusController@quickEdit'
    ]);
    Route::put('menus/{id}/quickUpdate', [
        'as' => 'menus.quickUpdate',
        'uses' => 'MenusController@quickUpdate'
    ]);
    Route::get('menus/quickCreate', [
        'as' => 'menus.quickCreate',
        'uses' => 'MenusController@quickCreate'
    ]);
    Route::post('menus/quickStore', [
        'as' => 'menus.quickStore',
        'uses' => 'MenusController@quickStore'
    ]);
    Route::get('menus/{id}/quickDestroy', [
        'as' => 'menus.quickDestroy',
        'uses' => 'MenusController@quickDestroy'
    ]);*/
    // Route::resource('menus', 'MenusController');
    // End of menus route

    Route::get('/settings', [
        'as' => 'settings.index',
        'uses' => 'SettingsController@index'
    ]);
    Route::post('/settings', [
        'as' => 'settings.update',
        'uses' => 'SettingsController@update'
    ]);
    Route::get('/profile', [
        'as' => 'profile.index',
        'uses' => 'ProfileController@index'
    ]);
    Route::post('/profile', [
        'as' => 'profile.update',
        'uses' => 'ProfileController@update'
    ]);
});