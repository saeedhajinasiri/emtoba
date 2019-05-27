<?php

use App\Setting;
use Illuminate\Support\Facades\Cache;

function getSetting($key) {
    return Cache::remember('settings.' . $key, 60, function () use ($key) {
        return Setting::query()
            ->where('key', $key)
            ->first()->toArray()['value'];
    });
}

/*
 * Route of sites
 */
Route::get('/', ['as' => 'site.index', 'uses' => 'SiteController@index']);
Route::get('/contacts', ['as' => 'site.contacts.create', 'uses' => 'ContactsController@create']);
Route::post('/contacts', ['as' => 'site.contacts.store', 'uses' => 'ContactsController@store']);

Route::get('/استخدام-وکیل', ['as' => 'site.attorneyEmployment.create', 'uses' => 'AttorneyEmploymentController@create']);
Route::post('/استخدام-وکیل', ['as' => 'site.attorneyEmployment.store', 'uses' => 'AttorneyEmploymentController@store']);

Route::get('/blog', ['as' => 'site.blog.index', 'uses' => 'BlogController@index']);
Route::get('blog/{id}', ['uses' => 'BlogController@show'])->where('id', '[0-9]+');
Route::get('blog/{id}-', ['uses' => 'BlogController@show'])->where('id', '[0-9]+');
Route::get('blog/{id}-{slug}', ['as' => 'site.blog.show', 'uses' => 'BlogController@show'])->where('id', '[0-9]+');
Route::post('blog/like/{id}', [
    'as' => 'site.blog.like',
    'uses' => 'BlogController@like'
]);

Route::get('/videos', ['as' => 'site.videos.index', 'uses' => 'VideosController@index']);
Route::get('videos/{id}', ['uses' => 'VideosController@show'])->where('id', '[0-9]+');
Route::get('videos/{id}-', ['uses' => 'VideosController@show'])->where('id', '[0-9]+');
Route::get('videos/{id}-{slug}', ['as' => 'site.videos.show', 'uses' => 'VideosController@show'])->where('id', '[0-9]+');
Route::post('videos/like/{id}', [
    'as' => 'site.videos.like',
    'uses' => 'VideosController@like'
]);

Route::get('/news', ['as' => 'site.news.index', 'uses' => 'PostsController@index']);
Route::get('news/{id}', ['uses' => 'PostsController@show'])->where('id', '[0-9]+');
Route::get('news/{id}-', ['uses' => 'PostsController@show'])->where('id', '[0-9]+');
Route::get('news/{id}-{slug}', ['as' => 'site.news.show', 'uses' => 'PostsController@show'])->where('id', '[0-9]+');
Route::post('news/like/{id}', [
    'as' => 'site.news.like',
    'uses' => 'PostsController@like'
]);

Route::get('/محتوای-ثبتی-اساسنامه', ['uses' => 'PagesController@statute']);
Route::get('/درباره-ما', ['uses' => 'PagesController@about']);
Route::get('/شعب-موسسه', ['as' => 'site.branches.index', 'uses' => 'BranchesController@index']);
Route::get('/موسسین-و-همکاران-حقوقی-و-قضایی', ['as' => 'site.partners.index', 'uses' => 'PartnersController@index']);

Route::post('/comments/{id}/{model}', ['as' => 'comment.create', 'uses' => 'SiteController@commentCreate']);

Auth::routes();
Route::any('logout', ['as' => 'logout', 'namespace' => 'Auth', 'uses' => 'Auth\LoginController@logout']);


/*
 * Route of Admins
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'RouteAuthorize'], 'namespace' => 'Admin'], function () {

    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

    Route::resource('admins', 'AdminsController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');
    Route::resource('translations', 'TranslationsController');
    Route::resource('contacts', 'ContactsController');
    Route::resource('departments', 'DepartmentsController');
    Route::resource('pages', 'PagesController');
    Route::resource('links', 'LinksController');
    Route::resource('branches', 'BranchesController');
    Route::resource('sliders', 'SlidersController');
    Route::resource('comments', 'CommentsController');
    Route::resource('attorney', 'AttorneyEmploymentsController');

    // Customers route
    Route::resource('customers', 'CustomersController');
    Route::get('customers/{id}/loginAs', [
        'as' => 'customers.loginAs',
        'uses' => 'CustomersController@loginAs'
    ]);
    // END of Customers route

    // Posts route
    Route::resource('posts', 'PostsController');
    Route::post('posts/{post}/uploadPhoto', [
        'as' => 'posts.uploadPhoto',
        'uses' => 'PostsController@uploadPhoto'
    ]);
    Route::post('posts/{post}/removePhoto/{media}', [
        'as' => 'posts.removePhoto',
        'uses' => 'PostsController@removePhoto'
    ]);
    // END of Posts route

    // Blog route
    Route::resource('blog', 'BlogController');
    Route::post('blog/{blog}/uploadPhoto', [
        'as' => 'blog.uploadPhoto',
        'uses' => 'BlogController@uploadPhoto'
    ]);
    Route::post('blog/{blog}/removePhoto/{media}', [
        'as' => 'blog.removePhoto',
        'uses' => 'BlogController@removePhoto'
    ]);
    // END of Blog route

    // Videos route
    Route::resource('videos', 'VideosController');
    Route::post('videos/{videos}/uploadPhoto', [
        'as' => 'videos.uploadPhoto',
        'uses' => 'VideosController@uploadPhoto'
    ]);
    Route::post('videos/{videos}/removePhoto/{media}', [
        'as' => 'videos.removePhoto',
        'uses' => 'VideosController@removePhoto'
    ]);
    // END of Videos route

    // Partners route
    Route::resource('partners', 'PartnersController');
    // END of Partners route

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
    // End of locations route

    // Menus route
    Route::get('menus/', [
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
    ]);
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