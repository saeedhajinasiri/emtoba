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
</header>