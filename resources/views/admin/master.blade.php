<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $site_title }} - {{ trans($title) }}</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="/panel/assets/dist/img/ico/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/panel/assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/panel/assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/panel/assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/panel/assets/dist/img/ico/apple-touch-icon-144-precomposed.png">

    <!-- Start Global Mandatory Style -->
    <link href="/panel/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/lobipanel/lobipanel.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/pace/flash.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/themify-icons/themify-icons.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/summernote/summernote.css" rel="stylesheet" type="text/css"/>
    <!-- Start Theme Layout Style -->
    <link href="/panel/assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/dist/css/styleBD-rtl.css" rel="stylesheet" type="text/css"/>
    @yield('additional_css')
    <style>
        .select2-results__options, .select2-selection__rendered {
            direction: rtl;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
@include('admin.partials.header')

@include('admin.partials.aside')

<!-- =============================================== -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="header-icon"><i class="ti-pencil-alt"></i></div>
            <div class="header-title">
                <h1> @lang($title) </h1>
                <small> {{--@lang($title . '.list')--}} </small>
                <ol class="breadcrumb">
                    <li><a href="{{ route('admin.dashboard.index') }}"><i class="pe-7s-home"></i> داشبورد </a></li>
                    @if (isset($parentRoute))
                        <li><a href="{{ $parentRoute }}"> {{ $parentRouteName }}</a></li>
                    @endif
                    <li class="active">@lang($title)</li>
                </ol>
            </div>
        </section>

        @if (count($errors) > 0)
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="content">
            @include('flash::message')

            @yield('content')
        </div>
    </div>
    @include('admin.partials.footer')
</div>
<!-- Start Core Plugins -->
<script src="/panel/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="/panel/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<script src="/panel/assets/dist/js/frame.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/summernote/summernote.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        var lfm = function (options, cb) {
            var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = cb;
        };

        // Define LFM summernote button
        var LFMButton = function (context) {
            var ui = $.summernote.ui;
            var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function () {
                    lfm({type: 'image', prefix: '/laravel-filemanager'}, function (url, path) {
                        context.invoke('insertImage', url);
                    });
                }
            });
            return button.render();
        };

        $('#content').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'lfm', 'video']],
                ['view', ['fullscreen', 'codeview']]
            ],
            popover: {
                image: [
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
            buttons: {
                lfm: LFMButton
            },
            height: 500,
            minHeight: null,
            maxHeight: null
        });
    });
</script>
<!-- Start Theme label Script -->
@yield('additional_js')
<script src="/panel/assets/dist/js/dashboard.js" type="text/javascript"></script>
</body>
</html>
