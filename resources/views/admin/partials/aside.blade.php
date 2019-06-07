<aside class="main-sidebar">
    <div class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel text-center">
            <div class="image">
                <img src="{{ $user->avatar_link }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <p>{{ $user->name }}</p>
                <a href="{{ route('admin.profile.index') }}"><i class="pe-7s-key"></i> @lang('admin.logout') </a>
            </div>
        </div>

        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>--}}

        <ul class="sidebar-menu">
            <li class="header">منوی اصلی</li>
            {!! $menu !!}
        </ul>
    </div>
</aside>