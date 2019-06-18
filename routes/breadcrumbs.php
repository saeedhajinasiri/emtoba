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

// Home > Blog
Breadcrumbs::for('site.blog.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.blog.index'), route('site.blog.index'));
});
Breadcrumbs::for('site.blog.show', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.blog.list');

    $breadcrumbs->push($item->title, $item->link);
});

// Home > Videos
Breadcrumbs::for('site.videos.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.videos.index'), route('site.videos.index'));
});
Breadcrumbs::for('site.videos.show', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.videos.list');

    $breadcrumbs->push($item->title, $item->link);
});

// Home > partners
Breadcrumbs::for('site.partners.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.partners.index'), route('site.partners.index'));
});

// Home > attorney employment
Breadcrumbs::for('site.attorneyEmployment.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.attorneyEmployment.index'), route('site.attorneyEmployment.create'));
});

// Home > employees
Breadcrumbs::for('site.employees.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.employees.index'), route('site.employees.create'));
});

// Home > contacts
Breadcrumbs::for('site.contacts.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.contacts.index'), route('site.contacts.create'));
});
Breadcrumbs::for('site.contacts.show', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.contacts.show'), route('site.contacts.show'));
});

// Home > elearning
Breadcrumbs::for('site.elearning.show', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.elearning.show'), route('site.elearning.show'));
});
Breadcrumbs::for('site.lessons.show', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.lessons.show'), route('site.lessons.show'));
});

// Home > branches
Breadcrumbs::for('site.branches.list', function ($breadcrumbs) {
    $breadcrumbs->parent('site.home');
    $breadcrumbs->push(trans('site.branches.index'), route('site.branches.index'));
});

Breadcrumbs::for('site.pages.show', function ($breadcrumbs, $item) {
    $breadcrumbs->parent('site.home');

    $breadcrumbs->push($item->title, $item->link);
});