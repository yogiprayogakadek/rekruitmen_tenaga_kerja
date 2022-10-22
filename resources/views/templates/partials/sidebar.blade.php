<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">
                        <i class="las la-home"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('pengumuman') ? 'active' : '' }}" href="{{route('pengumuman.index')}}">
                        <i class="las la-pager"></i> <span data-key="t-widgets">Pengumuman</span>
                    </a>
                </li>
                @if (Auth::guard('weboperator')->user())

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('lowongan') ? 'active' : '' }}" href="{{route('lowongan.index')}}">
                        <i class="las la-briefcase"></i> <span data-key="t-widgets">Lowongan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('pelamar') ? 'active' : '' }}" href="{{route('pelamar.index')}}">
                        <i class="las la-user-circle"></i> <span data-key="t-widgets">Pelamar</span>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('dokumen') ? 'active' : '' }}" href="{{route('dokumen.index')}}">
                        <i class="las la-newspaper"></i> <span data-key="t-widgets">Dokumen</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('lamaran') ? 'active' : '' }}" href="{{route('lamaran.index')}}">
                        <i class="las la-flask"></i> <span data-key="t-widgets">Lamaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('jadwal') ? 'active' : '' }}" href="{{route('jadwal.index')}}">
                        <i class="las la-table"></i> <span data-key="t-widgets">Jadwal</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('prainterview') ? 'active' : '' }}" href="{{route('prainterview.index')}}">
                        <i class="las la-pencil-ruler"></i> <span data-key="t-widgets">Pra Interview</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{Request::is('finalinterview') ? 'active' : '' }}" href="{{route('finalinterview.index')}}">
                        <i class="las la-pencil-ruler"></i> <span data-key="t-widgets">Final Interview</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>