<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir" dir="rtl">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    @yield('meta_tags')
    <link href="/images/toba.png" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link rel="stylesheet" href="/main/css/animate.min.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/sppagebuilder.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/slider-pro.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/flex_css_rtl.css">
    <link rel="stylesheet" href="/main/css/style4.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/slick.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/default.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/awards.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/legacy.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/template.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/bootstrap-rtl.min.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/rtl.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/preset1.css" type="text/css" class="preset"/>
    <link rel="stylesheet" href="/main/css/pagebuilder.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/frontend-edit.css" type="text/css"/>

    <style type="text/css">
        #sp-top-bar {
            background-color: #3d3d3d;
            color: #dedede;
        }

        #sp-top-bar a {
            color: #969696;
        }

        #sp-top-bar a:hover {
            color: #f14833;
        }

        #sp-logo {
            background-color: #919191;
        }

        #sp-logo a {
            color: #e0e0e0;
        }

        #sp-logo a:hover {
            color: #ffffff;
        }

        #sp-header {
            background-color: #3b3b3b;
        }

        #sp-header a {
            color: #e0e0e0;
        }

        #sp-header a:hover {
            color: #ffffff;
        }

        #sp-page-title {
            background-color: #a8a8a8;
        }

        #sp-main-body {
            background-image: url("/main/img/1414.jpg");
            background-repeat: repeat;
        }

        #sp-footer {
            background-color: #363839;
            color: #8f8f8f;
        }

        #sp-footer a {
            color: #a3a3a3;
        }

        #sp-footer a:hover {
            color: #ff7070;
        }
    </style>
    <link rel="stylesheet" href="/main/css/chosen.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/vm-rtl-common.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/vm-rtl-reviews.css" type="text/css"/>
    <link rel="stylesheet" href="/main/css/wk-styles.css" type="text/css" id="wk-styles-css"/>
    <link rel="stylesheet" href="/main/css/style.css" type="text/css" id="wk-styles-css"/>

    @yield('stylesheets')
</head>
<body class="site com-sppagebuilder view-page no-layout no-task itemid-101 fa-ir rtl  sticky-header layout-fluid">
<div class="body-innerwrapper">
    <section id="sp-top-bar">
        <div class="container">
            <div class="row">
                <div id="sp-top1" class="col-sm-9 col-md-9">
                    <div class="sp-column">
                        <ul class="social-icons col-sm-2" style="float: right;">
                            @if(getSetting('facebook_url'))
                                <li><a target="_blank" href="{{ getSetting('facebook_url') }}"><i class="fa fa-facebook"></i></a></li>
                            @endif
                            @if(getSetting('telegram_url'))
                                <li><a target="_blank" href="{{ getSetting('telegram_url') }}"><i class="fa fa-paper-plane"></i></a></li>
                            @endif
                            @if(getSetting('instagram_url'))
                                <li><a target="_blank" href="{{ getSetting('instagram_url') }}"><i class="fa fa-instagram"></i></a></li>
                            @endif
                        </ul>
                        <ul class="sp-contact-info">
                            @if(getSetting('tel'))
                                <li class="sp-contact-phone"><i class="pe pe-7s-headphones"></i>{{ getSetting('tel') }}</li>
                            @endif
                            @if(getSetting('work_hours'))
                                <li class="sp-office-hours"><i class="pe pe-7s-timer"></i>{{ getSetting('work_hours') }} </li>
                            @endif
                            @if(getSetting('email'))
                                <li class="sp-contact-email"><i class="pe pe-7s-mail"></i> <a href="mailto:{{ getSetting('email') }}">{{ getSetting('email') }}</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div id="sp-top2" class="col-sm-3 col-md-3">
                    <div class="sp-column ">
                        <div class="sp-module ">
                            <div class="sp-module-content">

                                <div class="custom">
                                    <p style="text-align: center;">
                                        <span style="font-family: tahoma, arial, helvetica, sans-serif; font-size: 10pt;">فارسی |
                                            <a href="/lang">العربیه</a> |
                                            <a href="/lang">English</a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('site.partials.header')
    <section id="sp-page-title">
        <div class="row">
            <div id="sp-title" class="col-sm-12 col-md-12">
                <div class="sp-column "></div>
            </div>
        </div>
    </section>
    @yield('breadcrumbs')

    @if (isset($errors) && count($errors) > 0)
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif


    @yield('content')

    @include('site.partials.footer')
</div>
<script type="text/javascript">window.$crisp = [];
    window.CRISP_WEBSITE_ID = "feb9b2b5-a1ca-4005-9070-66ae27256182";
    (function () {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();
</script>
<script src="/main/js/jquery.min.js" type="text/javascript"></script>
<script src="/main/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/main/js/jquery.sliderPro.packed.js" type="text/javascript"></script>
<script src="/main/js/slick.packed.js" type="text/javascript"></script>
<script src="/main/js/sppagebuilder.js" type="text/javascript"></script>
<script src="/main/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/main/js/jquery.sticky.js" type="text/javascript"></script>
<script src="/main/js/modernizr.js" type="text/javascript"></script>
<script src="/main/js/SmoothScroll.js" type="text/javascript"></script>
<script src="/main/js/matchheight.js" type="text/javascript"></script>
<script src="/main/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="/main/js/scrolling-nav.js" type="text/javascript"></script>
<script src="/main/js/jquery.nav.js" type="text/javascript"></script>
<script src="/main/js/vm-cart.js" type="text/javascript"></script>
<script src="/main/js/main.js" type="text/javascript"></script>
<script src="/main/js/frontend-edit.js" type="text/javascript"></script>
@yield('scripts')
</body>


</html>