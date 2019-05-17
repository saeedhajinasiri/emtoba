@extends('site.main')@section('meta_tags')    {{--<title>{{ $page->title }} | {{ getSetting('site_title') }}</title>    <link rel="canonical" href="{{ url()->current() }}">    <meta name="keywords" content="{{ $page->keywords }}">    <meta name="description" content="{{ $page->description }}">    <meta property="og:title" content="{{ $page->title }}"/>    <meta property="og:description" content="{{ $page->description }}"/>--}}@stop@section('content')    <section id="sp-main-body">        <div class="row">            <div id="sp-component" class="col-sm-12 col-md-12">                <div class="sp-column">                    <div id="sp-page-builder" class="sp-page-builder">                        <section class="sppb-section shadow" style="margin:30px 0px 0px 0px;">                            @foreach($branches as $branch)                                <section class="sppb-section">                                    <div class="sppb-row">                                        <div class="sppb-col-sm-10 sppb-col-sm-offset-1">                                            <div class="sppb-addon-container">                                                <div class="sppb-addon sppb-addon-image-content aligment-left clearfix shadow" style="margin: 50px 0">                                                    <div style="background-image:url({{ $branch->image_link }});background-size:inherit;" class="sppb-image-holder"></div>                                                    <div class="sppb-row">                                                        <div class="sppb-col-sm-6 sppb-col-sm-offset-6">                                                            <div class="sppb-content-holder">                                                                <h3 class="sppb-image-content-title sppb-addon-title">{{ $branch->title }}</h3>                                                                <div class="sppb-image-content-text">                                                                    @if($branch->address)                                                                        <div>                                                                            <span>                                                                                <span>                                                                                    <img class="" style="float: right;margin-left: 10px" src="/main/img/location.png"                                                                                         alt="" width="30" height="30">{!! $branch->address !!}<br><br>                                                                                </span>                                                                            </span>                                                                        </div>                                                                    @endif                                                                    @if($branch->name || $branch->tel)                                                                        <div>                                                                            <span>                                                                                <span>                                                                                    <img class="" style="float: right;margin-left: 10px" src="/main/img/mobile.png" alt="" width="30" height="30">                                                                                    @if($branch->name)                                                                                        {!! $branch->name !!}<br>                                                                                    @endif                                                                                    @if($branch->tel)                                                                                        {!! $branch->tel !!} <br>                                                                                    @endif                                                                                    <br>                                                                                </span>                                                                            </span>                                                                        </div>                                                                    @endif                                                                    @if($branch->fax)                                                                        <div>                                                                            <span>                                                                                <span>                                                                                    <img class="" style="float: right;margin-left: 10px" src="/main/img/Fax_pic.png"                                                                                         alt="" width="30" height="30">{!! $branch->fax !!}<br><br>                                                                                </span>                                                                            </span>                                                                        </div>                                                                    @endif                                                                    @if($branch->email)                                                                        <div>                                                                            <span>                                                                                <span>                                                                                    <img class="" style="float: right;margin-left: 10px" src="/main/img/fax.png"                                                                                         alt="" width="30" height="30">{!! $branch->email !!}<br><br>                                                                                </span>                                                                            </span>                                                                        </div>                                                                    @endif                                                                    @if($branch->website)                                                                        <div>                                                                            <span>                                                                                <span>                                                                                    <img class="" style="float: right;margin-left: 10px" src="/main/img/website.png"                                                                                         alt="" width="30" height="30">                                                                                    <a href="{{ $branch->website }}">{{ $branch->website }}</a>                                                                                </span>                                                                                <br><br>                                                                            </span>                                                                        </div>                                                                    @endif                                                                </div>                                                            </div>                                                        </div>                                                    </div>                                                </div>                                            </div>                                        </div>                                        <div class="sppb-col-sm-1">                                            <div class="sppb-addon-container " style=""></div>                                        </div>                                    </div>                                </section>                            @endforeach                        </section>                    </div>                </div>            </div>        </div>    </section>@endsection@section('stylesheets')@stop@section('scripts')@stop