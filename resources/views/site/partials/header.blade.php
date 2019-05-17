@if(isset($isHomePage) && $isHomePage)
    <header id="sp-header" class="flex">
        <div class="container">
            <div class="row">
                <div id="sp-logo" class="col-xs-8 col-sm-2 col-md-2">
                    <div class="sp-column logobckg">
                        <a class="logo" href="{{ URL::to('/') }}">
                            <h1>
                                <img class="sp-default-logo" src="{{ URL::to('/') }}/main/img/logo4.png" alt="عدالت محوران طوبی">
                                <img class="sp-retina-logo" src="{{ URL::to('/') }}/main/img/logo4.png" alt="عدالت محوران طوبی" width="80" height="80">
                            </h1>
                        </a>
                    </div>
                </div>
                @include('site.partials.menu')
            </div>
        </div>
    </header>
@else
    <section id="sp-logo" class="addspace">
        <div class="container">
            <div class="row">
                <div id="sp-logo" class="col-sm-3 col-md-3">
                    <div class="sp-column ">
                        <a class="logo" href="/">
                            <h1>
                                <img class="sp-default-logo" src="/main/img/logo4.png" alt="عدالت محوران طوبی">
                                <img class="sp-retina-logo" src="/main/img/logo4.png" alt="عدالت محوران طوبی" width="80" height="80">
                            </h1>
                        </a>
                    </div>
                </div>
                <div id="sp-addspace" class="col-sm-9 col-md-9">
                    <div class="sp-column centered">
                        <div class="sp-module ">
                            <div class="sp-module-content">
                                <div class="custom">
                                    <p><img class="img-rounded" src="/main/img/flex-banner-1.png" alt=""></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="sp-header-sticky-wrapper" class="sticky-wrapper" style="height: 56px;">
        <header id="sp-header" class="addspace menu-fixed-out" style="width: 100%;">
            <div class="container">
                <div class="row">
                    @include('site.partials.menu')
                </div>
            </div>
        </header>
    </div>
@endif
{{--
<header class="main-header">
    <a href="{{ URL::to('/') }}" class="header-logo ajax">
        <img src="{{ URL::to('/') }}/assets/images/logo.png" alt="">
    </a>

    <div class="nav-button-wrap">
        <div class="nav-button">
            <span class="nos"></span>
            <span class="ncs"></span>
            <span class="nbs"></span>
            <div class="menu-button-text">Menu</div>
        </div>
    </div>

    <div class="header-contacts">
        <ul>
            <li><span> Call: </span> <a href="tel:{{ $settings['mobile'] }}">{{ $settings['mobile'] }}</a></li>
            <li><span> Email: </span> <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></li>
        </ul>
    </div>
</header>--}}
