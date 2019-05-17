<header id="sp-header" class="flex">
    <div class="container">
        <div class="row">
            <div id="sp-logo" class="col-xs-8 col-sm-2 col-md-2">
                <div class="sp-column logobckg">
                    <a class="logo" href="/">
                        <h1>
                            <img class="sp-default-logo"
                                 src="/main/img/logo4.png"
                                 alt="عدالت محوران طوبی">
                            <img
                                    class="sp-retina-logo"
                                    src="/main/img/logo4.png"
                                    alt="عدالت محوران طوبی" width="80" height="80">
                        </h1>
                    </a>
                </div>
            </div>
            <div id="sp-menu" class="col-xs-4 col-sm-10 col-md-10">
                <div class="sp-column flex">
                    <div class="sp-megamenu-wrapper">
                        <a id="offcanvas-toggler" class="visible-xs visible-sm" href="#"><i class="fa fa-bars"></i></a>

                        <ul class="sp-megamenu-parent menu-fade-down-fade-up hidden-xs hidden-sm">
                            @foreach($siteMenus as $menu)
                                <li class="sp-menu-item @if(isset($menu['children']) && count($menu['children']) > 0) sp-has-child @endif">
                                    <a href="#">{{ $menu['title'] }}</a>
                                    @if(isset($menu['children']) && count($menu['children']) > 0)
                                        <div class="sp-dropdown sp-dropdown-main sp-menu-right" style="width: 240px;">
                                            <div class="sp-dropdown-inner">
                                                <ul class="sp-dropdown-items">
                                                    @foreach($menu['children'] as $child)
                                                        <li class="sp-menu-item"><a href="#">{{ $child['title'] }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
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
