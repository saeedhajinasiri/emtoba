@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.reset_password') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ url('reset_password') }}">
    <meta name="keywords" content="{{ trans('site.reset_password.keywords') }}">
    <meta name="description" content="{{ trans('site.reset_password.description') }}">
@stop

<!-- Main Content -->
@section('content')
    <section class="page-title theme-overlay overlay-black  pt-150 pb-20" style="background-image:url('/images/parallax/image-3.jpg');">
        <div class="auto-container">
            <h1>فراموشی رمز عبور</h1>

            {!! Breadcrumbs::render('reset-password') !!}
        </div>
    </section>

    <div class="contact-section">
        <div class="auto-container">
            <div class="row clearfix">
                <section class="default-section blog-section">
                    <h1 class="title-bottom fs-18 mb-30">ارسال لینک</h1>
                    <div class="form">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <ul class="row clearfix col-xs-12 col-sm-6">
                                <li class="form-group col-xs-12{{ $errors->has('email') ? ' has-error' : '' }}">
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

                                <li class="form-group col-xs-12">
                                    <button class="hvr-bounce-to-right" type="submit" name="submit-form">ارسال رمز عبور &ensp; <span class="icon flaticon-envelope32"></span></button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
