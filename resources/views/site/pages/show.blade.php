@extends('site.main')@section('meta_tags')    <title>{{ $page->title }} | {{ getSetting('site_title') }}</title>    <link rel="canonical" href="{{ url()->current() }}">    <meta name="keywords" content="{{ $page->keywords }}">    <meta name="description" content="{{ $page->description }}">    <meta property="og:title" content="{{ $page->title }}"/>    <meta property="og:description" content="{{ $page->description }}"/>@stop@section('content')    <section id="sp-main-body">        <div class="container">            <div class="row">                <div id="sp-component" class="col-sm-12 col-md-12">                    <div class="sp-column ">                        <div id="system-message-container">                        </div>                        <article class="item item-page" itemscope itemtype="http://schema.org/Article">                            <meta itemprop="inLanguage" content="fa-IR"/>                            <div class="page-header">                                <h1>{!! $page->title !!}</h1>                            </div>                            <div itemprop="articleBody">                                {!! $page->content !!}                            </div>                        </article>                    </div>                </div>            </div>        </div>    </section>@endsection@section('stylesheets')@stop@section('scripts')@stop