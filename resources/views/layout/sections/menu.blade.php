<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class=" nav-item {{ preg_match('/account\/dashboard/', Request::path()) ? 'active' : null }}"><a
            href="#"><i class="feather icon-home"></i><span class="menu-title"
                data-i18n="Dashboard">Dashboard</span></a></li>
        
    <li class=" nav-item {{ preg_match('/account\/users/', Request::path()) ? 'active' : null }}"><a
        href="#"><i class="feather icon-user"></i><span class="menu-title"
            data-i18n="Users">Users</span></a></li>

    <li class=" nav-item {{ preg_match('/account\/categories/', Request::path()) ? 'active' : null }}"><a
        href="#"><i class="feather icon-box"></i><span class="menu-title"
            data-i18n="Categories">Categories</span></a></li>

    <li class=" nav-item {{ preg_match('/account\/posts/', Request::path()) ? 'active' : null }}"><a
            href="#"><i class="feather icon-file"></i><span class="menu-title"
                data-i18n="Posts">Posts</span></a>
</ul>
