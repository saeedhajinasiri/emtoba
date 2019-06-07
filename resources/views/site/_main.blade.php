<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    @yield('meta_tags')
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/assets/css/reset.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/assets/css/plugins.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/assets/css/color.css">
    <!--=============== favicons ===============-->
    <link rel="icon" type="image/png" href="{{ URL::to('/') }}/assets/images/favicon.ico">
    @yield('stylesheets')
</head>
<body>

<div class="loader2">
    <div class="loader loader_each"><span></span></div>
</div>

<div id="main">
    @include('site.header')
    <div class="left-panel">
        <div class="horizonral-subtitle"><span><strong></strong></span></div>
        <div class="left-panel_social">
            <ul>
                @if($settings['facebook_url'])
                    <li><a target="_blank" href="{{ $settings['facebook_url'] }}"><i class="fab fa-facebook-m"></i></a></li>
                @endif
                @if($settings['youtube_url'])
                    <li><a target="_blank" href="{{ $settings['youtube_url'] }}"><i class="fab fa-youtube-m"></i></a></li>
                @endif
                @if($settings['instagram_url'])
                    <li><a target="_blank" href="{{ $settings['instagram_url'] }}"><i class="fab fa-instagram-m"></i></a></li>
                @endif
                @if($settings['telegram_url'])
                    <li><a target="_blank" href="{{ $settings['telegram_url'] }}"><i class="fab fa-telegram-m"></i></a></li>
                @endif
                @if($settings['whatsapp_url'])
                    <li><a target="_blank" href="{{ $settings['whatsapp_url'] }}"><i class="fab fa-whatsapp-m"></i></a></li>
                @endif
            </ul>
        </div>
    </div>

    <div id="wrapper">
        <div class="content-holder" data-pagetitle="Nasiri ArchVIZ Studio &nbsp;">
            <div class="nav-holder but-hol">
                <div class="nav-scroll-bar-wrap fl-wrap">
                {{--<div class="nav-search">
                    <form action="#" class="searh-inner fl-wrap">
                        <input name="se" id="se" type="text" class="search fl-wrap" placeholder="Search.." value="Search..."/>
                        <button class="search-submit color-bg" id="submit_btn"><i class="fal fa-search"></i></button>
                    </form>
                </div>--}}
                <!-- nav -->
                    <nav class="nav-inner" id="menu">
                        <ul>
                            <li><a class="{{ strpos($current_uri, '/') === 0 ? 'act-link' : '' }}" href="{{ route('site.index') }}">Home</a></li>
                            <li><a class="{{ strpos($current_uri, 'about') !== false ? 'act-link' : '' }}" href="{{ route('site.about.show') }}">About Studio</a></li>
                            <li><a class="{{ strpos($current_uri, 'projects') !== false ? 'act-link' : '' }}" href="{{ route('site.projects.index') }}">Projects</a></li>
                            <li><a class="{{ strpos($current_uri, 'clients') !== false ? 'act-link' : '' }}" href="{{ route('site.clients.show') }}">Clients</a></li>
                            <li><a class="{{ strpos($current_uri, 'contacts') !== false ? 'act-link' : '' }}" href="{{ route('site.contacts.create') }}">Contacts</a></li>
                            <li><a class="{{ strpos($current_uri, 'blog') !== false ? 'act-link' : '' }}" href="{{ route('site.blog.index') }}">Blog</a></li>
                        </ul>
                    </nav>
                    <div class="lang-links fl-wrap">
                        <a href="#" class="act-leng">EN</a><a href="#">FR</a>
                    </div>
                </div>
                <div class="nav-social">
                    <span class="nav-social_title">Follow us : </span>
                    <ul>
                        @if($settings['facebook_url'])
                            <li><a target="_blank" href="{{ $settings['facebook_url'] }}"><i class="fab fa-facebook-m"></i></a></li>
                        @endif
                        @if($settings['youtube_url'])
                            <li><a target="_blank" href="{{ $settings['youtube_url'] }}"><i class="fab fa-youtube-m"></i></a></li>
                        @endif
                        @if($settings['instagram_url'])
                            <li><a target="_blank" href="{{ $settings['instagram_url'] }}"><i class="fab fa-instagram-m"></i></a></li>
                        @endif
                        @if($settings['telegram_url'])
                            <li><a target="_blank" href="{{ $settings['telegram_url'] }}"><i class="fab fa-telegram-m"></i></a></li>
                        @endif
                        @if($settings['whatsapp_url'])
                            <li><a target="_blank" href="{{ $settings['whatsapp_url'] }}"><i class="fab fa-whatsapp-m"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="nav-overlay">
                <div class="element"></div>
            </div>

            @yield('content')
            @include('site.footer')
        </div>
    </div>
</div>
<!--=============== scripts  ===============-->
<script type="text/javascript" src="{{ URL::to('/') }}/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/assets/js/plugins.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/assets/js/core.js"></script>
<script type="text/javascript" src="{{ URL::to('/') }}/assets/js/scripts.js"></script>
</body>
</html>