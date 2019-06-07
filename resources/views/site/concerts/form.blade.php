@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.concerts.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.concerts.create') }}">
    <meta name="keywords" content="{{ trans('site.concerts.keywords') }}">
    <meta name="description" content="{{ trans('site.concerts.description') }}">

    <meta property="og:title" content="{{ trans('site.concerts.index') }}"/>
    <meta property="og:description" content="{{ trans('site.concerts.description') }}"/>
@stop

@section('content')
    <section id="sp-main-body">
        <div class="container">
            <div class="row">
                <div id="sp-component" class="col-sm-12 col-md-12">
                    <div class="sp-column mt-10">
                        @include('flash::message')

                        @if(isset($content))
                            <h2>{!! $content->title !!}</h2>
                            <div class="formBody">
                                {!! $content->content !!}
                            </div>
                            <br>
                        @endif

                        {!! form_start($form) !!}

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.first_name'):‌ (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->first_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.last_name'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->last_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.national_code'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->national_code) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.father_name'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->father_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.email'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->email) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.gender'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->gender) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.birth_date'): (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->birth_date) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.tel'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->tel) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.mobile'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->mobile) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.postal_code'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->postal_code) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.national_code_image'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->image) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.address'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->address) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.captcha'): (*)</label>
                            <div class="col-md-4">
                                <input class="form-control ltr" placeholder="@lang('site.contacts.captcha')" name="captcha" type="text" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                {!! Captcha::img() !!}
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="form-group col-sm-12">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input name="submit" value="@lang('site.contacts.register')" class="btn btn-success" type="submit">
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! form_end($form, false) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('stylesheets')
@stop

@section('scripts')
@stop