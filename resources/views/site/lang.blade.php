<!DOCTYPE html>
<html class="sp-comingsoon" xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir" dir="rtl">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="Super User"/>
    <meta name="generator" content="Joomla! - Open Source Content Management"/>
    <title>coming soon | قریبا | عدالت محوران طوبی</title>
    <link href="/images/gggg.png" rel="shortcut icon" type="image/vnd.microsoft.icon"/>
    <link rel="stylesheet" href="main/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="main/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="main/css/template.css" type="text/css"/>
    <link rel="stylesheet" href="main/css/preset1.css" type="text/css"/>
    <link rel="stylesheet" href="main/css/377785cc.css" type="text/css" id="wk-styles-css"/>
    <style type="text/css">
        .sp-comingsoon body {
            background-color: transparent !important;
            background-image: url(main/img/bckg-nyc.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: 50% 50%;
        }

        .sp-comingsoon body a.logo {
            background: rgba(0, 0, 0, 0.6);
        }

        .sp-comingsoon body a.logo + .fa-clock-o {
            opacity: 0.57;
        }

        .sp-comingsoon body a.logo:hover + .fa-clock-o {
            opacity: 0.85
        }
    </style>
    <script src="main/js/jquery.min.js" type="text/javascript"></script>
    <script src="main/js/jquery-noconflict.js" type="text/javascript"></script>
    <script src="main/js/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="main/js/caption.js" type="text/javascript"></script>
    <script src="main/js/jquery.countdown.min.js" type="text/javascript"></script>
    <script src="main/js/bd731d1b.js" type="text/javascript"></script>
    <script src="main/js/832bfd41.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(window).on('load', function () {
            new JCaption('img.caption');
        });
    </script>

</head>
<body class="with-bckg-img text-shadow">
<a class="logo" href="/">
    <div class="backhome hidden-xs hidden-sm"><i class="fa fa-angle-left"></i> بازگشت به صفحه اصلی</div>
    <img class="sp-default-logo" src="main/img/toba.png" alt="عدالت محوران طوبی">
</a>
<div class="fa fa-clock-o"></div>
<div class="sp-comingsoon-wrap">
    <div class="container">
        <div class="text-center">
            <div id="sp-comingsoon">

                <h1 class="sp-comingsoon-title">
                    coming soon | قریبا </h1>

                <div class="sp-comingsoon-content">
                    This page is being updated | هذه الصفحة يتم تحديثه
                </div>

                <div id="sp-comingsoon-countdown" class="sp-comingsoon-countdown">

                </div>


                <ul class="social-icons">
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function ($) {
        $('#sp-comingsoon-countdown').countdown('2019/6/12', function (event) {
            $(this).html(event.strftime('<div class="days"><span class="number">%-D</span><span class="string">%!D:روز,روز;</span></div><div class="hours"><span class="number">%H</span><span class="string">%!H:ساعت,ساعت;</span></div><div class="minutes"><span class="number">%M</span><span class="string">%!M:دقیقه,دقیقه;</span></div><div class="seconds"><span class="number">%S</span><span class="string">%!S:ثانیه,ثانیه;</span></div>'));
        });
    });
</script>

</body>
</html>