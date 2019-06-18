@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.reset_password') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ url('reset_password') }}">
    <meta name="keywords" content="{{ trans('site.reset_password.keywords') }}">
    <meta name="description" content="{{ trans('site.reset_password.description') }}">
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('reset-password') !!}
@stop

<!-- Main Content -->
@section('content')
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <h1 class="title-bottom fs-18 mb-30">ارسال لینک</h1>
                    <div class="form">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="form-group col-sm-12">
                                <label class="control-label col-sm-2">@lang('site.contacts.email'):‌ (*)</label>
                                <div class="col-sm-5">
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="@lang('site.contacts.email')" required>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input name="submit" value="@lang('site.contact.send_password')" class="btn btn-success" type="submit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
