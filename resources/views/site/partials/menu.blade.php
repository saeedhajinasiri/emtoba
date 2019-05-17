<div id="sp-menu" class="col-xs-4 col-sm-10 col-md-10">
    <div class="sp-column centered">
        <div class="sp-megamenu-wrapper">
            <a id="offcanvas-toggler" class="visible-xs visible-sm" href="#"><i class="fa fa-bars"></i></a>

            <ul class="sp-megamenu-parent menu-fade-down-fade-up hidden-xs hidden-sm">
                @foreach($siteMenus as $menu)
                    <li class="sp-menu-item @if(isset($menu['children']) && count($menu['children']) > 0) sp-has-child @endif">
                        <a href="{{ $menu['link'] }}">{{ $menu['title'] }}</a>
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