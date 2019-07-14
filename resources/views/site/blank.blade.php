<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    @yield('meta_tags')
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
    <link rel="stylesheet" href="/main/css/style.css" type="text/css" id="wk-styles-css"/>
    @yield('stylesheets')
</head>
<body>
<div id="wrapper">
    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>
</div>
<script src="/main/js/jquery.min.js" type="text/javascript"></script>
<script src="/main/js/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/main/js/jquery.sliderPro.packed.js" type="text/javascript"></script>
<script src="/main/js/slick.packed.js" type="text/javascript"></script>
<script src="/main/js/sppagebuilder.js" type="text/javascript"></script>
<script src="/main/js/bootstrap.min.js" type="text/javascript"></script>
@yield('scripts')
<script>
    $(document).ready(function () {
        $('#reload_captcha').click(function (event) {
            $('#captcha_image').attr('src', $('#captcha_image').attr('src') + '{{ captcha_src() }}');
        });
    })
</script>
</body>
</html>
