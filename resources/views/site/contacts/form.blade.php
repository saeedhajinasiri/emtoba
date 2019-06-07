@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.employees.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.employees.create') }}">
    <meta name="keywords" content="{{ trans('site.employees.keywords') }}">
    <meta name="description" content="{{ trans('site.employees.description') }}">

    <meta property="og:title" content="{{ trans('site.employees.index') }}"/>
    <meta property="og:description" content="{{ trans('site.employees.description') }}"/>
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
                            <label class="control-label col-sm-2">@lang('site.contacts.full_name'):‌ (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->full_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.email'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->email) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.departments'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->department_id) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.subject'): (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->subject) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">@lang('site.contacts.content'): (*)</label>
                            <div class="col-sm-8">
                                {!! form_widget($form->content) !!}
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
                                <input name="submit" value="@lang('site.employees.send')" class="btn btn-success" type="submit">
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