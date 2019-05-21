@extends('site.main')

@section('meta_tags')
    <title>{{ trans('site.attorneyEmployment.index') }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.attorneyEmployment.create') }}">
    <meta name="keywords" content="{{ trans('site.attorneyEmployment.keywords') }}">
    <meta name="description" content="{{ trans('site.attorneyEmployment.description') }}">

    <meta property="og:title" content="{{ trans('site.attorneyEmployment.index') }}"/>
    <meta property="og:description" content="{{ trans('site.attorneyEmployment.description') }}"/>
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
                            <label class="control-label col-sm-2">نام‌:‌ (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->first_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">نام خانوادگی : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->last_name) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">جنسیت : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->gender) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">شماره شناسنامه : (*)</label>
                            <div class="col-sm-4">
                                {!! form_widget($form->birth_certificate_number) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">کد ملی : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->national_code) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">صادره از : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->birth_place) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">تلفن ثابت : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->phone) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">شماره همراه : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->mobile) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">ایمیل : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->email) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">آدرس : (*)</label>
                            <div class="col-md-4">
                                {!! form_widget($form->address) !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">تصویر پروانه وکالت </label>
                            <div class="col-md-4">
                                <input type="file" name="file">
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label class="control-label col-sm-2">رزومه : (*)</label>
                            <div class="col-md-8">
                                {!! form_widget($form->description) !!}
                            </div>
                        </div>

                        {{--<div class="form-group col-sm-12">
                            <label class="control-label col-sm-2"></label>
                            <div class="col-md-8">
                                {!! Recaptcha::render() !!}
                            </div>
                        </div>--}}

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