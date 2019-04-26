@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.register.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ url('register') }}">
    <meta name="keywords" content="{{ trans('site.register.keywords') }}">
    <meta name="description" content="{{ trans('site.register.description') }}">
@stop


@section('content')
    <section class="page-title theme-overlay overlay-black" style="background-image:url('/images/parallax/image-3.jpg');">
        <div class="auto-container">
            <h1>{{ trans('site.register_in_our_site') }}</h1>

            {!! Breadcrumbs::render('register') !!}
        </div>
    </section>

    <div class="contact-section">
        <div class="auto-container">
            <div class="row clearfix">
                <section class="default-section blog-section">
                    <h1 class="title-bottom fs-18 mb-30"> عضویت در سایت</h1>
                    <div class="form">
                        <form class="validated-contact-form" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <ul class="row clearfix col-xs-12">
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="name"><span class="icon fa fa-user"></span> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="نام و نام خانوادگی" required autofocus>
                                        </div>
                                    </div>
                                    @if ($errors->has('name'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="email"><span class="icon fa fa-envelope"></span> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="ایمیل" required>
                                        </div>
                                    </div>
                                    @if ($errors->has('email'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="mobile"><span class="icon fa fa-mobile"></span> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="mobile" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="موبایل" required>
                                        </div>
                                    </div>
                                    @if ($errors->has('mobile'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('tel') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="tel"><span class="icon fa fa-phone"></span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="tel" type="text" name="tel" value="{{ old('tel') }}" placeholder="تلفن">
                                        </div>
                                    </div>
                                    @if ($errors->has('tel'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="address"><span class="icon fa fa-map-marker"></span></label>
                                        </div>
                                        <div class="field-outer">
                                            <textarea id="address" type="text" name="address" placeholder="آدرس">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    @if ($errors->has('address'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="password"><span class="icon fa fa-key"></span> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="password" type="password" name="password" placeholder="رمز عبور">
                                        </div>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </li>
                                <li class="form-group col-xs-12 col-sm-6{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                    <div class="form-group-inner">
                                        <div class="icon-box">
                                            <label for="password-confirm"><span class="icon fa fa-key"></span> <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="field-outer">
                                            <input id="password-confirm" type="password" name="password-confirm" placeholder="تکرار رمز عبور" required>
                                        </div>
                                    </div>
                                </li>

                                <li class="form-group col-xs-12 text-right">
                                    <button class="hvr-bounce-to-right" type="submit" name="submit-form">ثبت نام</button>
                                </li>
                            </ul>
                            {{--<div class="result col-xs-12 mt-30 mb-30 green fs-16"> با تشکر از شما، عضویت شما با موفقیت انجام شد.</div>--}}
                            <div class="col-md-12 col-xs-12 mt-30 mb-30 fs-16">
                                <p><a class="green" href="{{ route('login') }}">{{ trans('site.register.log_in') }}</a></p>
                                <p><a class="red" href="/password/reset/">{{ trans('site.register.reset_your_password') }}</a></p>
                            </div>
                        </form>

                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
