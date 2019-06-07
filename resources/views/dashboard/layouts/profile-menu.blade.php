<li class="dropdown user-panel-dd notifications_dropdown0" data-notification-url="/accounts/notifications/">
    <a class="dropdown-toggle notifications-count-base" data-toggle="dropdown" href="#notifications_dropdown" aria-expanded="false">
        <i class="fa fa-comment fa-lg"></i>
        <span class="badge read-notification-count">0</span>
    </a>

    <ul class="dropdown-menu notifications-dropdown scrollable-menu">
        <li class="divider"></li>
        <li><a>No messages.</a></li>
    </ul>
    <div class="notification-timestamp" style="display: none" data-timestamp="None" data-need-notifications="false"></div>
    <script>
        $('.notifications-mark-as-read').click(function () {
            $('.notifications-count-base').html('<i class="fa fa-comment fa-lg"></i>&nbsp;<span class="badge read-notification-count">0</span>');
            $('.notification-menu-entry').removeClass('unread-msg');
            $.ajax({
                url: '/ajax/notifications/mark_all_read/',
                type: 'GET'
            });
        });
    </script>
</li>
<li class="dropdown user-panel-dd">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#user_dropdown" aria-expanded="true">
        <i class="fa fa-user fa-fw"></i><b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
        <li><a href="{{ route('dashboard.home.index') }}"><i class="fa fa-user fa-fw"></i> {{ $user->name }} </a></li>
        <li><a href="{{ route('dashboard.profile.edit') }}"><i class="fa fa-edit fa-fw"></i>&nbsp;{{ trans('dashboard.edit.profile') }} </a></li>
        <li><a href="{{ route('dashboard.settings.edit') }}"><i class="fa fa-edit fa-fw"></i>&nbsp;{{ trans('dashboard.settings.edit') }} </a></li>
        <li><a href="/ads"><i class="fa fa-dashboard fa-fw"></i>&nbsp;{{ trans('dashboard.advertise.index') }} </a></li>
        <li class="divider"></li>
        <li class="user-panel-dd"><a href="/accounts/wallet/"><i class="fa fa-btc fa-fw"></i>&nbsp;Wallet: 0 BTC</a></li>
        <li class="divider"></li>

        <li class="two-factor-notification">
            <a href="/accounts/security/">Account security:<strong id="dashboard-weak-account-security"> weak </strong></a>
        </li>

        <li class="divider"></li>
        <li><a href="/merchant/"><i class="fa fa-shopping-cart fa-fw"></i>&nbsp;Merchant</a></li>
        <li><a href="/accounts/trusted/"><i class="fa fa-star fa-fw"></i>&nbsp;Trusted</a></li>
        <li class="divider"></li>
        <li class="user-panel-dd"><a href="/support/"><i class="fa fa-ambulance fa-fw"></i>&nbsp;Support</a></li>
    </ul>
</li>