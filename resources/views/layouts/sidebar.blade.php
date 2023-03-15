<aside class="main-sidebar theme-background elevation-4">
    <!-- Brand Logo -->

    {{-- <a href="/" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text text-white font-weight-light">{{ env('APP_NAME') }}</span>
    </a> --}}
    <!-- Sidebar -->
    @role('Super-Admin')
         <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image ">
                <img src="https://img.icons8.com/bubbles/50/null/guest-male.png" />
            </div>
            <div class="info">
                <a href="{{ route('users.profile') }}" class="d-block text-white">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.offices') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            आयोजना
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('budget-sources.index') }}" class="nav-link text-white">
                        <i class="bi bi-bank nav-icon"></i>
                        <p>बजेट स्रोत</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-3 nav-icon"></i>
                        <p>आयोजनाको किसिम</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('expenditure-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-2 nav-icon"></i>
                        <p>खर्चको किसिम</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Layout Options
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link text-white">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Top Navigation + Sidebar</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li class="nav-header">Settings</li>

                <li class="nav-item">
                    <a href="{{ route('offices.index') }}" class="nav-link text-white">
                        <i class="bi bi-buildings nav-icon"></i>
                        <p>कार्यालयहरू</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('fiscal-years.index') }}" class="nav-link text-white">
                        <i class="bi bi-calendar3 nav-icon"></i>
                        <p>आर्थिक वर्ष</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link text-white">
                        <i class="bi bi-people nav-icon"></i>
                        <p>प्रयोगकर्ताहरु</p>
                    </a>
                </li>

                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right nav-icon"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    @endrole
    @role('admin')
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image ">
                <img src="https://img.icons8.com/bubbles/50/null/guest-male.png" />
            </div>
            <div class="info">
                <a href="{{ route('users.profile') }}" class="d-block text-white">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.secondlevel',Auth::user()->office) }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            आयोजना
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('budget-sources.index') }}" class="nav-link text-white">
                        <i class="bi bi-bank nav-icon"></i>
                        <p>बजेट स्रोत</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-3 nav-icon"></i>
                        <p>आयोजनाको किसिम</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('expenditure-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-2 nav-icon"></i>
                        <p>खर्चको किसिम</p>
                    </a>
                </li>

                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right nav-icon"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    @endrole
    @role('user')
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image ">
                <img src="https://img.icons8.com/bubbles/50/null/guest-male.png" />
            </div>
            <div class="info">
                <a href="{{ route('users.profile') }}" class="d-block text-white">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ route('home') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projects.secondlevel',Auth::user()->office) }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            आयोजना
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('budget-sources.index') }}" class="nav-link text-white">
                        <i class="bi bi-bank nav-icon"></i>
                        <p>बजेट स्रोत</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('project-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-3 nav-icon"></i>
                        <p>आयोजनाको किसिम</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('expenditure-types.index') }}" class="nav-link text-white">
                        <i class="bi bi-diagram-2 nav-icon"></i>
                        <p>खर्चको किसिम</p>
                    </a>
                </li>

                <hr>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right nav-icon"></i>
                        <p>
                            {{ __('Logout') }}
                        </p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    @endrole
    <!-- /.sidebar -->
</aside>
