<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{ trans('auth.login.title') }}</title>

    <!-- Favicon and touch icons -->
    <link rel="shortcut icon" href="/panel/assets/dist/img/ico/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="/panel/assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="/panel/assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="/panel/assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="/panel/assets/dist/img/ico/apple-touch-icon-144-precomposed.png">

    <!-- Bootstrap -->
    <link href="/panel/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap rtl -->
    <link href="/panel/assets/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet" type="text/css"/>
    <!-- Pe-icon-7-stroke -->
    <link href="/panel/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css"/>
    <link href="/panel/assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap toggle css -->
    <link href="/panel/assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet" type="text/css"/>
    <!-- style css -->
    <link href="/panel/assets/dist/css/styleBD.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style rtl -->
    <link href="/panel/assets/dist/css/styleBD-rtl.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="http://gc.kis.scr.kaspersky-labs.com/7295C785-A027-764C-B540-EF6F32D008C3/main.js" charset="UTF-8"></script>
</head>
<body>
<!-- Content Wrapper -->
<div class="login-wrapper">
    <div class="back-link">
        <a href="{{ url('/') }}" class="btn btn-success"> بازگشت به سایت </a>
    </div>
    <div class="container-center">
        <div class="panel panel-bd">
            <div class="panel-heading">
                <div class="view-header">
                    <div class="header-icon">
                        <i class="pe-7s-unlock"></i>
                    </div>
                    <div class="header-title">
                        <h3>ورود</h3>
                        <small><strong>لطفا مشخصات خود را وارد کنید.</strong></small>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <form id="loginForm" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label class="control-label" for="username">نام کاربری</label>

                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="control-label" for="password">رمز عبور</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="i-check">
                            <input type="checkbox" id="rememberMe" name="remember">
                            <label for="rememberMe"> منو به خاطر بسپار </label>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-primary" type="submit">Login</button>
                        {{--<a class="btn btn-warning" href="register.html">Register</a>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- jQuery -->
<script src="/panel/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="/panel/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/panel/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        "use strict"; // Start of use strict
        $('.i-check input').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-red'
        });
    });
</script>
</body>
</html>