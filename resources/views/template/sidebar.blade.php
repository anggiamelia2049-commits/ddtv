<style>
    /* Hover submenu */
    .nav-sidebar .nav-treeview>.nav-item>.nav-link:hover {
        background-color: #007bff !important;
        color: #ffffff !important;
    }

    /* Hover menu utama */
    .nav-sidebar>.nav-item>.nav-link:hover {
        background-color: #069fff !important;
        color: #ffffff !important;
    }

    /* Active */
    .nav-sidebar .nav-link.active {
        background-color: #007bff !important;
        color: #ffffff !important;
    }
</style>

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <div class="sidebar">

        <a href="#" class="brand-link" style="display:flex; align-items:center; padding:0.8125rem 0.5rem;">
            <img src="{{ asset('assets/logo.png') }}"
                style="height:55px; width:auto; margin:0; float:none; display:block;">

            <span style="margin-left:9px; line-height:1.2;">
                <strong style="font-size:18px; color:#2386d1;">SEKOLAH ISLAM</strong><br>
                <strong style="font-size:18px; color:#2386d1;">DIAN DIDAKTIKA</strong>
            </span>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>

                <li
                    class="nav-item {{ request()->routeIs('category.*', 'videos.*', 'flyers.*', 'banners.*', 'runningtext.*', 'prayerschedules.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('category.*', 'videos.*', 'flyers.*', 'banners.*', 'runningtext.*', 'prayerschedules.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p> Pages Menu <i class="right fas fa-angle-left"></i></p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}"
                                class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tags"></i>
                                <p>Category</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('videos.index') }}"
                                class="nav-link {{ request()->routeIs('videos.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-play"></i>
                                <p>Video</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('flyers.index') }}"
                                class="nav-link {{ request()->routeIs('flyers.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Flyer</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('banners.index') }}"
                                class="nav-link {{ request()->routeIs('banners.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bookmark"></i>
                                <p>Banner</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('runningtext.index') }}"
                                class="nav-link {{ request()->routeIs('runningtext.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-font"></i>
                                <p>Running Text</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('prayerschedules.index') }}"
                                class="nav-link {{ request()->routeIs('prayerschedules.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Prayer Schedule</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>

    <!-- LOGOUT FIX -->
    <div class="mt-auto p-3">

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>

    </div>
</aside>
