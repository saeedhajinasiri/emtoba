@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.register.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ url('register') }}">
    <meta name="keywords" content="{{ trans('site.register.keywords') }}">
    <meta name="description" content="{{ trans('site.register.description') }}">
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('register') !!}
@stop

@section('content')
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <h1 class="title-bottom fs-18 mb-30"> عضویت در سایت</h1>
                    <div class="form">
                        <form class="validated-contact-form" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.full_name'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('site.contacts.full_name')" required autofocus>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.email'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="@lang('site.contacts.email')" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.mobile'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" placeholder="@lang('site.contacts.mobile')" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.tel'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="tel" type="text" name="tel" class="form-control" value="{{ old('tel') }}" placeholder="@lang('site.contacts.tel')">
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.address'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <textarea id="address" type="text" rows="10" class="form-control" name="address" placeholder="@lang('site.contacts.address')">{{ old('address') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.password'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="@lang('site.contacts.password')">
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <label class="control-label col-sm-4">@lang('site.contacts.password_confirm'):‌ (*)</label>
                                <div class="col-sm-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password-confirm" placeholder="@lang('site.contacts.password_confirm')" required>
                                </div>
                            </div>

                            <div class="form-group col-sm-6">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <input name="submit" value="@lang('site.contact.register')" class="btn btn-success" type="submit">
                                </div>
                            </div>

                            {{--<div class="result col-xs-12 mt-30 mb-30 green fs-16"> با تشکر از شما، عضویت شما با موفقیت انجام شد.</div>--}}
                            <div class="col-md-12 col-xs-12 mt-30 mb-30 fs-16">
                                <p><a class="green" href="{{ route('login') }}">{{ trans('site.register.log_in') }}</a></p>
                                <p><a class="red" href="/password/reset/">{{ trans('site.register.reset_your_password') }}</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
