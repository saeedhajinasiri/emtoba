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