@extends('site.main')

@section('meta_tags')
    <title>{{ $page->title }} | {{ getSetting('site_title') }}</title>
    <link rel="canonical" href="{{ route('site.about.show') }}">
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="{{ $page->description }}">

    <meta property="og:title" content="{{ $page->title }}"/>
    <meta property="og:description" content="{{ $page->description }}"/>
@stop

@section('content')
    <div class="content">
        <div class="fixed-column-wrap">
            <div class="pr-bg"></div>
            <div class="fixed-column-wrap-content">
                <div class="scroll-nav-wrap color-bg">
                    <div class="carnival">Scroll down</div>
                    <div class="snw-dec">
                        <div class="mousey">
                            <div class="scroller"></div>
                        </div>
                    </div>
                </div>
                <div class="bg" data-bg="{{ $page->image_link }}"></div>
                <div class="overlay"></div>
                <div class="progress-bar-wrap bot-element">
                    <div class="progress-bar"></div>
                </div>
                <div class="fixed-column-wrap_title first-tile_load">
                    <h2>{{ $page->title }}</h2>
                    <p>{!! $page->content !!}</p>
                </div>
                <div class="fixed-column-dec"></div>
            </div>
        </div>

        <div class="column-wrap">
            <div class="column-wrap-container fl-wrap">
                <section id="sec1" class="small-padding">
                    <div class="container">
                        <div class="split-sceen-content_title fl-wrap">
                            <div class="pr-bg pr-bg-white"></div>
                            <h3>{{ $page->title }}</h3>
                            <p>{!! $page->content !!}</p>
                        </div>
                        @foreach($clients as $client)
                            <div class="team-box">
                                <div class="pr-bg pr-bg-white"></div>
                                <div class="team-photo">
                                    <div class="overlay"></div>
                                    <img src="{{ $client->image_link }}" alt="{{ $client->name }}" class="respimg">
                                    <ul class="team-social">
                                        @if($client->facebook)
                                            <li><a href="{{ $client->facebook }}" target="_blank"><i class="fab fa-facebook-m"></i></a></li>
                                        @endif
                                        @if($client->instagram)
                                            <li><a href="{{ $client->instagram }}" target="_blank"><i class="fab fa-instagram-m"></i></a></li>
                                        @endif
                                        @if($client->twitter)
                                            <li><a href="{{ $client->twitter }}" target="_blank"><i class="fab fa-twitter-m"></i></a></li>
                                        @endif
                                        @if($client->linkedin)
                                            <li><a href="{{ $client->linkedin }}" target="_blank"><i class="fab fa-linkedin-m"></i></a></li>
                                        @endif
                                    </ul>
                                    @if($client->email)
                                        <a href="mailto:{{ $client->email }}" class="team-contact_btn color-bg"><i class="fal fa-envelope"></i></a>
                                    @endif
                                </div>
                                <div class="team-info">
                                    <h3>{{ $client->name }}</h3>
                                    <h4>{{ $client->job }}</h4>
                                    <p>{!! $client->content !!}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="section-number right_sn">
                            <div class="pr-bg pr-bg-white"></div>
                            <span>0</span>1.
                        </div>
                    </div>
                </section>
                <div class="section-separator"></div>
            </div>
        </div>
        <div class="limit-box fl-wrap"></div>
    </div>
@stop

@section('stylesheets')
@stop

@section('scripts')
@stop