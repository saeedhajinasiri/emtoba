<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fa-ir" lang="fa-ir" dir="rtl">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>مرکز مشاوران حقوقی طوبی</title>
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
            background-color: #70131b;
            color: #dedede;
        }

        #sp-top-bar a {
            color: #969696;
        }

        #sp-top-bar a:hover {
            color: #f14833;
        }

        #sp-logo {

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
</head>
<body class="site com-sppagebuilder view-page no-layout no-task itemid-101 fa-ir rtl  sticky-header layout-fluid">
<div class="body-innerwrapper">
    <section id="sp-top-bar">
        <div class="container">
            <div class="row">
                <div id="sp-top1" class="col-sm-10 col-md-10">
                    <div class="sp-column "></div>
                </div>
                <div id="sp-top2" class="col-sm-2 col-md-2">
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

    <section id="sp-title">
        <div class="row">
            <div id="sp-title" class="col-sm-12 col-md-12">
                <div class="sp-column "></div>
            </div>
        </div>
    </section>

    <section id="sp-main-body">
        <div class="row">
            <div id="sp-component" class="col-sm-12 col-md-12">
                <div class="sp-column ">
                    <div id="system-message-container">
                    </div>

                    <div id="sp-page-builder" class="sp-page-builder  page-1">

                        <div class="page-content">
                            @include('site.partials.slider')
                            <section class="sppb-section" style="margin:10px;padding:4px 0px 20px 0px;color:#ffffff;background-color:#303030;background-image:url(/main/img/stripes.svg);background-repeat:repeat;background-size:inherit;background-attachment:inherit;background-position:50% 50%;">
                                <div class="sppb-container">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-12">
                                            <div class="sppb-addon-container" style="color:#ffffff;padding:20px 0px 0px 0px;width: 100%;">
                                                @if(getSetting('elearning_center_url'))
                                                    <div class="sppb-text-center">
                                                        <a style="width: 100%" href="{{ getSetting('elearning_center_url') }}"
                                                           class="sppb-btn-success sppb-btn-lg sppb-selector sppb-btn-block" role="button">@lang('admin.settings.elearning_center_url')</a>
                                                    </div>
                                                @endif
                                                <section class="sppb-section " style="">
                                                    <div class="sppb-container-inner">
                                                        <div class="sppb-row">
                                                            @if(getSetting('telegram_registering_url'))
                                                                <div class="sppb-col-sm-3">
                                                                    <div class="sppb-addon-container">
                                                                        <div class="sppb-text-center">
                                                                            <a style="width: 100%" href="{{ getSetting('telegram_registering_url') }}"
                                                                               class="sppb-btn sppb-btn-dark sppb-btn- sppb-selector" role="button">
                                                                                <i class="pe pe-7s-paper-plane"></i>@lang('admin.settings.telegram_registering_url')
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(getSetting('toba_center_url'))
                                                                <div class="sppb-col-sm-6">
                                                                    <div class="sppb-addon-container " style="width: 100%">
                                                                        <div class="sppb-text-center">
                                                                            <a href="{{ getSetting('toba_center_url') }}" class="sppb-btn sppb-btn-dark sppb-btn- sppb-selector sppb-btn-block "
                                                                               role="button">@lang('admin.settings.toba_center_url')</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if(getSetting('counselors_contact_url'))
                                                                <div class="sppb-col-sm-3">
                                                                    <div class="sppb-addon-container ">
                                                                        <div style="width: 100%;" class="sppb-text-center">
                                                                            <a style="width: 100%" href="{{ getSetting('counselors_contact_url') }}" class="sppb-btn sppb-btn-dark sppb-btn- sppb-selector  "
                                                                               role="button">@lang('admin.settings.counselors_contact_url')</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            @if(getSetting('mohta_holding'))
                                <section id="take-control" class="sppb-section" style="margin:0px;padding:0px;color:#ffffff;background-image:url(/main/img/bckg-4.jpg);background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:50% 50%;">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-12">
                                            <div class="sppb-addon-container black_bckg-50 text-shadow" style="padding:40px 90px 60px;">
                                                <div class="sppb-addon sppb-addon-single-image sppb-text-center">
                                                    <div class="sppb-addon-content">
                                                        <p><img alt="" class="sppb-img-responsive" src="/uploads/images/setting/{{ getSetting('mohta_holding') }}"/></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            @if(count($partners))
                                <section class="sppb-section" style="margin:0px;padding:40px 20px 60px;background-image:url(/images/svg/background-white-85.svg);">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-12">
                                                <div class="sppb-addon-container  sppb-wow fadeIn" style="padding:10px;"
                                                     data-sppb-wow-duration="800ms" data-sppb-wow-delay="200ms">
                                                    <div class="sppb-addon flex desaturate">
                                                        <div dir="rtl" class="slick-carousel-322 clearfix">

                                                            @foreach($partners as $partner)
                                                                <div class="slick-img">
                                                                    <a href="{{ $partner->url }}">
                                                                        <img title="{{ $partner->title }}" data-lazy="{{ $partner->image_link }}">
                                                                    </a>
                                                                    <div class="slick-desc"><br data-mce-bogus="1"></div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            <section class="sppb-section "
                                     style="margin:0px;padding:40px 20px 60px;background-image:url(/images/svg/background-white-85.svg);">
                                <div class="sppb-container">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-12 text-center">
                                            <div class="sppb-addon-container sppb-wow" style="padding:10px;">
                                                <div class="sppb-addon flex desaturate">
                                                    <div dir="rtl" class="clearfix">
                                                        <div class="slick-img" style="display: inline-block; width: 250px; height: 250px">
                                                            <a href="/رزرو-کنسرت">
                                                                <img src="/assets/images/celebration.png">
                                                            </a>
                                                        </div>
                                                        <div class="slick-img" style="display: inline-block; width: 250px; height: 250px">
                                                            <a href="/ثبت-نام-اردوی-جهادی">
                                                                <img src="/assets//images/jahadi.png">
                                                            </a>
                                                        </div>
                                                        <div class="slick-img" style="display: inline-block; width: 250px; height: 250px">
                                                            <a href="/ثبت-نام-مسابقه">
                                                                <img src="/assets//images/match.png">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            @if(getSetting('red_line_text'))
                                <div class="sppb-section" style="margin:10px;padding:4px 0px 20px 0px;color:#ffffff;background-color:#70131b;background-image:url(/images/svg/section-background-stripes.svg);background-repeat:repeat;background-size:inherit;background-attachment:inherit;background-position:50% 50%;">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-12">
                                                <div class="sppb-addon-container " style="color:#ffffff;padding:20px 0px 0px 0px;">
                                                    <div class="sppb-addon sppb-addon-module ">
                                                        <div class="sppb-addon-content">
                                                            <div class="custom" style="text-align: center;">
                                                                <p>{!! nl2br(getSetting('red_line_text')) !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(getSetting('red_line_text'))
                                <div class="sppb-section " style="margin:10px;padding:4px 0px 20px 0px;color:#ffffff;background-color:#303030;background-image:url(/images/svg/section-background-stripes.svg);background-repeat:repeat;background-size:inherit;background-attachment:inherit;background-position:50% 50%;">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-12">
                                                <div class="sppb-addon-container" style="color:#ffffff;padding:20px 0px 0px 0px;">
                                                    <div class="sppb-addon sppb-addon-module ">
                                                        <div class="sppb-addon-content">
                                                            <div class="custom" style="text-align: center;">
                                                                <p>{!! nl2br(getSetting('grey_line_text')) !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(getSetting('first_box_title') || getSetting('second_box_title') || getSetting('third_box_title') || getSetting('fourth_box_title'))
                                <div class="sppb-section " style="margin:5px;">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            @if(getSetting('first_box_title'))
                                                <div class="sppb-col-sm-3">
                                                    <div class="sppb-addon-container  sppb-wow fadeInLeft" style="padding:20px;">
                                                        <div class="sppb-addon sppb-addon-feature sppb-text-center ">
                                                            <div class="sppb-addon-content">
                                                                <div class="sppb-icon">&nbsp;</div>

                                                                <h3 class="sppb-feature-box-title" style="margin-bottom:20px;">{{ getSetting('first_box_title') }}</h3>

                                                                <div class="sppb-addon-text sppb-text-center">
                                                                    <p>{!! getSetting('first_box_content') !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(getSetting('second_box_title'))
                                                <div class="sppb-col-sm-3">
                                                    <div class="sppb-addon-container  sppb-wow fadeInLeft" style="padding:20px;">
                                                        <div class="sppb-addon sppb-addon-feature sppb-text-center ">
                                                            <div class="sppb-addon-content">
                                                                <div class="sppb-icon">&nbsp;</div>

                                                                <h3 class="sppb-feature-box-title" style="margin-bottom:20px;">{{ getSetting('second_box_title') }}</h3>

                                                                <div class="sppb-addon-text sppb-text-center">
                                                                    <p>{!! getSetting('second_box_content') !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(getSetting('third_box_title'))
                                                <div class="sppb-col-sm-3">
                                                    <div class="sppb-addon-container  sppb-wow fadeInLeft" style="padding:20px;">
                                                        <div class="sppb-addon sppb-addon-feature sppb-text-center ">
                                                            <div class="sppb-addon-content">
                                                                <div class="sppb-icon">&nbsp;</div>

                                                                <h3 class="sppb-feature-box-title" style="margin-bottom:20px;">{{ getSetting('third_box_title') }}</h3>

                                                                <div class="sppb-addon-text sppb-text-center">
                                                                    <p>{!! getSetting('third_box_content') !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(getSetting('fourth_box_title'))
                                                <div class="sppb-col-sm-3">
                                                    <div class="sppb-addon-container  sppb-wow fadeInLeft" style="padding:20px;">
                                                        <div class="sppb-addon sppb-addon-feature sppb-text-center ">
                                                            <div class="sppb-addon-content">
                                                                <div class="sppb-icon">&nbsp;</div>

                                                                <h3 class="sppb-feature-box-title" style="margin-bottom:20px;">{{ getSetting('fourth_box_title') }}</h3>

                                                                <div class="sppb-addon-text sppb-text-center">
                                                                    <p>{!! getSetting('fourth_box_content') !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if(getSetting('institute_registered_capital') || getSetting('registration_number') || getSetting('judicial_identifier'))
                                <section id="take-control" class="sppb-section" style="margin:0px;padding:0px;color:#ffffff;background-image:url(/main/img/bckg-4.jpg);background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:50% 50%;">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-12">
                                            <div class="sppb-addon-container black_bckg-50 text-shadow" style="padding:40px 90px 60px;">
                                                <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                                    <div class="sppb-addon sppb-addon-text-block sppb-text-center">
                                                        <div class="sppb-addon-content">
                                                            <h2 style="text-align:center"><span style="color:#c0392b"><span style="font-size:36px">مرکز مشاوران حقوقی طوبی</span></span></h2>

                                                            <p style="text-align:center">
                                                                @if(getSetting('institute_registered_capital'))
                                                                    <strong>&nbsp;<span style="font-size:16pt">سرمایه ثبت شده موسسه: &nbsp;<span>{!! getSetting('institute_registered_capital') !!}</span></span></strong><br/>
                                                                @endif
                                                                @if(getSetting('registration_number'))
                                                                    <strong><span style="font-size:16pt">شماره ثبت: &nbsp;<span>{!! getSetting('registration_number') !!}</span></span></strong><br/>
                                                                @endif
                                                                @if(getSetting('judicial_identifier'))
                                                                    <strong><span style="font-size:16pt">شناسه قضایی: &nbsp;<span>{!! getSetting('judicial_identifier') !!}</span></span></strong>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            @if(count($governments) > 0)
                                <section class="sppb-section" style="margin:0px;padding:40px 20px 60px;background-image:url(/images/svg/background-white-85.svg);">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-12">
                                                <div class="sppb-addon-container  sppb-wow fadeIn" style="padding:10px;"
                                                     data-sppb-wow-duration="800ms" data-sppb-wow-delay="200ms">
                                                    <div class="sppb-addon flex desaturate">
                                                        <div dir="rtl" class="slick-carousel-322 clearfix">
                                                            @foreach($governments as $item)
                                                                <div class="slick-img">
                                                                    <a href="{{ $item->url }}">
                                                                        <img data-lazy="{{ $item->image_link }}" title="{{ $item->title }}">
                                                                    </a>
                                                                    <div class="slick-desc"><br data-mce-bogus="1"></div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            <section class="sppb-section " style="">
                                <div class="sppb-container">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-12">
                                            <div class="sppb-addon-container " style=""></div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="sppb-section" style="color:#ffffff;background-color:#303030;">
                                <div class="sppb-container">
                                    <div class="sppb-row">
                                        <div class="sppb-col-sm-4">
                                            <div class="sppb-addon-container border-radius shadow flex dark" style="color:#b8b8b8;padding:20px 0px 0px 0px;">
                                                <div class="sppb-addon sppb-addon-module ">
                                                    <h3 class="sppb-addon-title" style="">آمار بازدید</h3>
                                                    <div class="sppb-addon-content">
                                                        <!-- Vinaora Visitors Counter >> http://vinaora.com/ -->
                                                        <div style="width: 100%;">

                                                            <div id="vvisit_counter151" class="vvisit_counter vacenter">
                                                                <div class="vstats_counter">
                                                                    <div class="vstats_number varight">
                                                                        <div class="vrow" title="">بازدید امروز</div>
                                                                        <div class="vrow" title="">بازدید دیروز</div>
                                                                        <div class="vrow" title="">بازدید این هفته</div>
                                                                        <div class="vrow" title="">بازدید این ماه</div>
                                                                        <div class="vrow" title="">کل بازدید</div>
                                                                        <div class="vfclear"></div>
                                                                    </div>
                                                                    <div class="vfclear"></div>
                                                                </div>
                                                                <hr style="margin-bottom: 5px;"/>
                                                                <div style="margin-bottom: 5px;">آی پی شما :
                                                                    {{ $_SERVER['REMOTE_ADDR'] }}
                                                                </div>
                                                                <div>{{ \Morilog\Jalali\jDate::forge(now())->format('Y/m/d') }}</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sppb-col-sm-4">
                                            <div class="sppb-addon-container border-radius shadow flex dark" style="">
                                                <div class="sppb-empty-space clearfix" style="margin-bottom:30px;"></div>
                                                <div class="sppb-addon sppb-addon-text-block sppb-text-center ">
                                                    <h3 class="sppb-addon-title" style="margin-top:10px;margin-bottom:20px;color:#f50505;"> مرکز مشاوران حقوقی طوبی</h3>
                                                    <div class="sppb-addon-content">
                                                        @if(getSetting('address'))
                                                            <p style="text-align:center">{{ getSetting('address') }}</p>
                                                        @endif

                                                        @if(getSetting('tel'))
                                                            <p style="text-align:center">تلفن : {{ getSetting('tel') }}</p>
                                                        @endif

                                                        @if(getSetting('postal_code'))
                                                            <p style="text-align:center">کدپستی : {{ getSetting('postal_code') }}</p>
                                                        @endif

                                                        @if(getSetting('fax'))
                                                            <p style="text-align:center">نمابر : {{ getSetting('fax') }}<br/></p>
                                                        @endif
                                                        <br/>
                                                        @if(getSetting('email'))
                                                            <p style="text-align:center">
                                                                <a href="mailto:{{ getSetting('email') }}">
                                                                    <span style="color:#c0392b">{{ getSetting('email') }}</span>
                                                                </a>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(getSetting('video_title'))
                                            <div class="sppb-col-sm-4">
                                                <div class="sppb-addon-container border-radius shadow flex dark"
                                                     style="padding:20px;">
                                                    <div class="sppb-addon sppb-addon-module ">
                                                        <div class="sppb-addon-content"><h3 class="sppb-addon-title"
                                                                                            style="">سخنان رهبری</h3>

                                                            <div class="custom">
                                                                <div id="15544669474106678">
                                                                    <script type="text/JavaScript" src="https://www.aparat.com/embed/LokgN?data[rnddiv]=15544669474106678&data[responsive]=yes"></script>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </section>

                            <section class="sppb-section" style="margin:20px;background-color:#ffffff;">
                                <div class="sppb-row">
                                    <div class="sppb-col-sm-4">
                                        <div class="sppb-addon-container sppb-wow fadeInDown">
                                            <div class="sppb-addon sppb-addon-text-block sppb-text-center">
                                                <h3 class="sppb-addon-title">ورود کاربران</h3>
                                                <div class="sppb-addon-content"></div>
                                            </div>
                                            <div class="sppb-addon sppb-addon-module">
                                                <div class="sppb-addon-content mr-10">
                                                    <form id="login-form" method="POST" action="{{ url('/login') }}">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="icon-user hasTooltip" title="نام کاربری"></i>
                                                                </span>
                                                                <input type="text" name="username" class="form-control" placeholder="نام کاربری"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="icon-lock hasTooltip" title="رمز ورود"></i>
                                                                    </span>
                                                                    <input type="password" name="password" class="form-control" placeholder="رمز ورود"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="form-login-remember" class="form-group">
                                                            <div class="checkbox">
                                                                <label for="modlgn-remember">
                                                                    <input type="checkbox" name="remember" class="inputbox"
                                                                           value="yes">مرا بخاطر داشته باش</label>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" name="Submit" class="btn btn-primary">ورود</button>
                                                            <a class="btn btn-success" href="{{ url('/register') }}">ایجاد حساب کاربری <span class="icon-arrow-right"></span></a>
                                                        </div>

                                                        <ul class="form-links">
                                                            <li>
                                                                <a href="{{ route('password.request') }}"> بازیابی رمز عبور</a>
                                                            </li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(getSetting('google_map_address'))
                                        <div class="sppb-col-sm-4">
                                            <div class="sppb-addon-container sppb-wow fadeInDown">
                                                <div class="sppb-addon sppb-addon-text-block sppb-text-center">
                                                    <h3 class="sppb-addon-title">نقشه</h3>
                                                    <div class="sppb-addon-content"></div>
                                                </div>
                                                <div class="sppb-addon sppb-addon-module">
                                                    <div class="sppb-addon-content">
                                                        <div class="custom">
                                                            {!! getSetting('google_map_address') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(getSetting('first_percentage_title') || getSetting('second_percentage_title') || getSetting('third_percentage_title') || getSetting('fourth_percentage_title'))
                                        <div class="sppb-col-sm-4">
                                            <div class="sppb-addon-container ml-10">
                                                <div class="sppb-addon sppb-addon-text-block sppb-text-center">
                                                    <h3 class="sppb-addon-title"> مرکز مشاوران حقوقی طوبی</h3>
                                                    <div class="sppb-addon-content"><br></div>
                                                </div>

                                                @if(getSetting('first_percentage_title'))
                                                    <div style="color:#de7e7e;" class="flex-text-wrapper">
                                                        <div class="flex-text" style="width: 80%">{{ getSetting('first_percentage_title') }}</div>
                                                        <div class="flex-progress-text">{{ getSetting('first_percentage_value') }}%</div>
                                                    </div>
                                                    <div style="height:5px;line-height:5px;" class="sppb-progress sppb-progress-10">
                                                    <div style="background-color:#e39a9a;line-height:5px;"
                                                             class="sppb-progress-bar flex" role="progressbar"
                                                             aria-valuenow="{{ getSetting('first_percentage_value') }}" aria-valuemin="0" aria-valuemax="100"
                                                             data-width="{{ getSetting('first_percentage_value') }}%"></div>
                                                    </div>
                                                    <div class="sppb-empty-space clearfix" style="margin-bottom:20px;"></div>
                                                @endif

                                                @if(getSetting('first_percentage_title'))
                                                    <div style="color:#eb7932;" class="flex-text-wrapper">
                                                        <div class="flex-text" style="width: 80%">{{ getSetting('second_percentage_title') }}</div>
                                                        <div class="flex-progress-text">{{ getSetting('second_percentage_value') }}%</div>
                                                    </div>
                                                    <div style="height:5px;line-height:5px;" class="sppb-progress sppb-progress-36">
                                                    <div style="background-color:#ff8a42;line-height:5px;" class="sppb-progress-bar flex" role="progressbar"
                                                             aria-valuenow="{{ getSetting('second_percentage_value') }}" aria-valuemin="0" aria-valuemax="100"
                                                             data-width="{{ getSetting('second_percentage_value') }}%"></div>
                                                    </div>
                                                    <div class="sppb-empty-space clearfix" style="margin-bottom:20px;"></div>
                                                @endif

                                                @if(getSetting('third_percentage_title'))
                                                    <div style="color:#a39d43;" class="flex-text-wrapper">
                                                        <div class="flex-text" style="width: 80%">{{ getSetting('third_percentage_title') }}</div>
                                                        <div class="flex-progress-text">{{ getSetting('third_percentage_value') }}%</div>
                                                    </div>
                                                    <div style="height:5px;line-height:5px;" class="sppb-progress sppb-progress-27 ">
                                                    <div style="background-color:#a39b32;line-height:5px;" class="sppb-progress-bar flex" role="progressbar"
                                                             aria-valuenow="{{ getSetting('third_percentage_value') }}" aria-valuemin="0" aria-valuemax="100"
                                                             data-width="{{ getSetting('third_percentage_value') }}%"></div>
                                                    </div>
                                                    <div class="sppb-empty-space clearfix" style="margin-bottom:20px;"></div>
                                                @endif

                                                @if(getSetting('fourth_percentage_title'))
                                                    <div style="color:#b89a9a;" class="flex-text-wrapper">
                                                        <div class="flex-text" style="width: 80%">{{ getSetting('fourth_percentage_title') }}</div>
                                                        <div class="flex-progress-text">{{ getSetting('fourth_percentage_value') }}%</div>
                                                    </div>
                                                    <div style="height:5px;line-height:5px;" class="sppb-progress sppb-progress-31">
                                                    <div style="background-color:#baafaf;line-height:5px;" class="sppb-progress-bar flex" role="progressbar"
                                                         aria-valuenow="{{ getSetting('fourth_percentage_value') }}" aria-valuemin="0" aria-valuemax="100"
                                                             data-width="{{ getSetting('fourth_percentage_value') }}%"></div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </section>

                            @if(count($certificates) > 0)
                                <section class="sppb-section" style="margin:0px;padding:40px 20px 60px;">
                                    <div class="sppb-container">
                                        <div class="sppb-row">
                                            <div class="sppb-col-sm-12">
                                                <div class="sppb-addon-container sppb-wow fadeIn" style="padding:10px;"
                                                     data-sppb-wow-duration="800ms"
                                                     data-sppb-wow-delay="200ms">
                                                    <div class="sppb-addon flex desaturate">
                                                        <div dir="rtl" class="slick-carousel-716 clearfix">
                                                            @foreach($certificates as $certificate)
                                                                <div class="slick-img">
                                                                    <a href="{{ $certificate->url }}">
                                                                        <img title="{{ $certificate->title }}" data-lazy="{{ $certificate->image_link }}">
                                                                    </a>
                                                                    <div class="slick-desc"><br data-mce-bogus="1"></div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
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
<script src="/main/js/jquery-noconflict.js" type="text/javascript"></script>
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

<script src="/main/js/https _cdn.ywxi.net_js_1.js" type="text/javascript"></script>


<script type="text/javascript">
    jQuery(function ($) {
        var $slick_carousel = $(".slick-carousel-322");
        jQuery(document).ready(function () {

            $slick_carousel.slick({

                lazyLoad: 'ondemand',
                slidesToShow: 5,
                slidesToScroll: 1,
                nextArrow: '<span style="font-size:44px;" class="slick-next"><i style="font-size:44px;" class="pe pe-7s-angle-right"></i></span>',
                prevArrow: '<span style="font-size:44px;" class="slick-prev"><i style="font-size:44px;" class="pe pe-7s-angle-left"></i></span>',
                rtl: true,
                autoplay: true, autoplaySpeed: 4000,

                speed: 700,


                adaptiveHeight: true,
                cssEase: 'cubic-bezier(0.635, 0.010, 0.355, 1.000)',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        });
    });
    window.setInterval(function () {
        var r;
        try {
            r = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP")
        } catch (e) {
        }
        if (r) {
            r.open("GET", "/index.php?option=com_ajax&format=json", true);
            r.send(null)
        }
    }, 840000);
    jQuery(function ($) {
        $(".hasTooltip").tooltip({"html": true, "container": "body"});
    });
    jQuery(function ($) {
        var $slick_carousel = $(".slick-carousel-716");
        jQuery(document).ready(function () {

            $slick_carousel.slick({

                lazyLoad: 'ondemand',
                slidesToShow: 5,
                slidesToScroll: 1,
                nextArrow: '<span style="font-size:44px;" class="slick-next"><i style="font-size:44px;" class="pe pe-7s-angle-right"></i></span>',
                prevArrow: '<span style="font-size:44px;" class="slick-prev"><i style="font-size:44px;" class="pe pe-7s-angle-left"></i></span>',
                rtl: true,
                autoplay: true, autoplaySpeed: 4000,

                speed: 700,


                adaptiveHeight: true,
                cssEase: 'cubic-bezier(0.635, 0.010, 0.355, 1.000)',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    }
                ]
            });
        });
    });
</script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $('#ap-smart-layerslider-mod_91').sliderPro({
                width: 2340,
                height: 850,
                forceSize: 'fullWidth',
                visibleSize: 'auto',
                slideDistance: 0,
                responsive: true,
                imageScaleMode: 'cover',
                autoScaleLayers: true,
                waitForLayers: false,
                orientation: 'horizontal',
                loop: true,
                fade: true,
                fadeOutPreviousSlide: false,
                fadeDuration: 700,
                autoplay: true,
                autoplayDelay: 9000,
                autoplayOnHover: 'none',
                reachVideoAction: 'playVideo',
                leaveVideoAction: 'stopVideo',
                playVideoAction: 'none',
                pauseVideoAction: 'none',
                endVideoAction: 'replayVideo',
                arrows: true,
                buttons: true,
                autoHeight: true
            });
            $("#ap-smart-layerslider-mod_91 .ap-layer").not(".sp-layer").contents().filter(function () {
                return this.nodeType == 3;
            }).remove();
            $("#ap-smart-layerslider-mod_91 .ap-layer").children().not(".sp-layer").remove();
        });
    })(jQuery);
</script>


</body>


</html>