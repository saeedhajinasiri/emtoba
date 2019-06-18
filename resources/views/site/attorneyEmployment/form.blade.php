@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.attorneyEmployment.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.attorneyEmployment.create') }}">
    <meta name="keywords" content="{{ trans('site.attorneyEmployment.keywords') }}">
    <meta name="description" content="{{ trans('site.attorneyEmployment.description') }}">

    <meta property="og:title" content="{{ trans('site.attorneyEmployment.index') }}"/>
    <meta property="og:description" content="{{ trans('site.attorneyEmployment.description') }}"/>
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('site.attorneyEmployment.list') !!}
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
                            <label class="control-label col-sm-2">@lang('site.contacts.gender'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->gender) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.birth_certificate_number'): (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->birth_certificate_number) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.national_code'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->national_code) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.birth_place'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->birth_place) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.phone'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->phone) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.mobile'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->mobile) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.email'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->email) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.address'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->address) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.attorney_image') </label>
                            <div class="col-md-4">
                                {!! form_widget($form->image) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.resume_description'): (*)</label>
                            <div class="col-md-8">
                                {!! form_widget($form->description) !!}
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
                                <input name="submit" value="@lang('site.attorneyEmployment.send')" class="btn btn-success" type="submit">
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