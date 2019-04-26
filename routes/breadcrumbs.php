<?php

// Home
Breadcrumbs::for('site.home', function ($breadcrumbs) {
    $breadcrumbs->push('صفحه اصلی', url('/'));
});

// Home > Login
Breadcrumbs::for('login', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push('ورود به سایت', url('login'));
});

// Home > Reset-Password
Breadcrumbs::for('reset-password', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push('فراموشی رمز عبور', url('password/reset'));
});

// Home > Register
Breadcrumbs::for('register', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push('ثبت نام در سایت', url('register'));
});

// Home > News
Breadcrumbs::for('site.news.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.news.index'), route('site.news.index'));
});
Breadcrumbs::for('site.news.show', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.news.list');

    $breadcrumbs->push($item->title, $item->link);
});

// Home > News
Breadcrumbs::for('site.projects.list', function ($breadcrumbs, $category = null) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.projects.index'), route('site.projects.index'));

    if ($category) {
        $breadcrumbs->push($category->title, route('site.projects.categories', $category->slug));
    }
});
Breadcrumbs::for('site.projects.show', function ($breadcrumbs, $item) {
    $category = '';
    if ($item->category) {
        $category = $item->category;
    }
    $breadcrumbs->parent('site.projects.list', $category);

    $breadcrumbs->push($item->title_fa, $item->link);
});

// Home > Videos
Breadcrumbs::for('site.videos.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.videos.index'), route('site.videos.index'));
});

// Home > Products
Breadcrumbs::for('site.projects.brand', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push('محصولات ' . $item->title_fa, $item->link);
});

Breadcrumbs::for('site.pages.show', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.home');

    $breadcrumbs->push($item->title, $item->link);
});

Breadcrumbs::for('site.basket.show', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');

    $breadcrumbs->push(trans('site.basket.index'), route('site.basket.index'));
});