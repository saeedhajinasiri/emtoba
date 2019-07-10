@extends('site.main')@section('meta_tags')    <title>{{ $page->title }} | {{ getSetting('site_title') }}</title>    <link rel="canonical" href="{{ url()->current() }}">    <meta name="keywords" content="{{ $page->keywords }}">    <meta name="description" content="{{ $page->description }}">    <meta property="og:title" content="{{ $page->title }}"/>    <meta property="og:description" content="{{ $page->description }}"/>@stop@section('breadcrumbs')    {!! Breadcrumbs::render('site.pages.show', $page) !!}@stop@section('content')    <section id="sp-main-body">        <div class="container">            <div class="row">                <div id="sp-component" class="col-sm-12 col-md-12">                    <div class="sp-column ">                        <div id="system-message-container">                        </div>                        <article class="item item-page" itemscope itemtype="http://schema.org/Article">                            <meta itemprop="inLanguage" content="fa-IR"/>                            <div class="page-header">                                <h1>{!! $page->title !!}</h1>                            </div>                            <div>                                {!! $page->content !!}                            </div>                            @if(count($abouts) > 0)                            <div class="sppb-addon sppb-addon-accordion">                                <div class="sppb-addon-content">                                    <div class="sppb-panel-group ">                                        @foreach($abouts as $about)                                        <div class="sppb-panel sppb-panel-default @if($loop->iteration == 0) active @endif">                                            <div class="sppb-panel-heading @if($loop->iteration == 0) active @endif">                                                <span class="sppb-panel-title">{!! $about->title !!}</span>                                            </div>                                            <div class="sppb-panel-collapse" style="display: block;">                                                <div class="sppb-panel-body">                                                    {!! $about->content !!}                                                </div>                                            </div>                                        </div>                                        @endforeach                                    </div>                                </div>                            </div>                            @endif                        </article>                    </div>                </div>            </div>        </div>    </section>@endsection@section('stylesheets')@stop@section('scripts')@stop