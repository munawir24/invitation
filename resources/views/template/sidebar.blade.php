<aside class="main-sidebar sidebar-dark-green elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('pictures/logo dara.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">
            <b>INV</b> Dara</span>
    </a>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <!-- SidebarSearch Form -->
        <div class="form-inline" {{ Auth::user()->level == 'Admin' ? '' : 'hidden' }}>
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search"
                    id="pencarian">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-fw fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="sidebar-search-results">
                <div class="list-group"><a href="#" class="list-group-item">
                        <div class="search-title"><strong class="text-light"></strong>N<strong
                                class="text-light"></strong>o<strong class="text-light"></strong> <strong
                                class="text-light"></strong>e<strong class="text-light"></strong>l<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>m<strong
                                class="text-light"></strong>e<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>t<strong class="text-light"></strong> <strong
                                class="text-light"></strong>f<strong class="text-light"></strong>o<strong
                                class="text-light"></strong>u<strong class="text-light"></strong>n<strong
                                class="text-light"></strong>d<strong class="text-light"></strong>!<strong
                                class="text-light"></strong></div>
                        <div class="search-path"></div>
                    </a></div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-collapse-hide-child {{ Auth::user()->level == 'Admin' ? 'nav-compact' : '' }}"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                <!-- Home-->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                @if (auth()->user()->role == 'SUPER ADMIN' || auth()->user()->role == 'ADMIN')
                    <li class="nav-item">
                        <a href="{{ route('tipe-undangan') }}"
                            class="nav-link {{ request()->is('tipe-undangan') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Jenis Undangan
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pesanan') }}"
                            class="nav-link {{ request()->is('pesanan') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-shopping-cart	"></i>
                            <p>
                                Order
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('tamu') }}" class="nav-link {{ request()->is('tamu') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tamu Undangan
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kiriman-pesan') }}"
                        class="nav-link {{ request()->is('sending-message') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            Kirim Pesan
                            <!-- <span class="right badge badge-danger">New</span> -->
                        </p>
                    </a>
                </li>


                <li class="nav-item" hidden>
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                {{-- Profile Admin --}}
                @if (auth()->user()->role == 'SUPER ADMIN')
                    <li class="nav-header">Pengaturan Akun</li>
                    <li class="nav-item">
                        <a href="{{ route('user') }}" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <span class="right badge">1</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}"
                            class="nav-link {{ request()->is('profile') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                @endif

                {{-- Tombol Logout --}}
                @guest
                    @if (Route::has('login'))
                    @endif
                    @if (Route::has('register'))
                    @endif
                @else
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link bg-red text-center"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Keluar
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <!-- <input type=" hidden" name="_token" value="U3m2QMDARSqPpCdmkaqRgG3HWyJQOZ8IPTRbeiog"> -->
                        </form>
                    </li>
                @endguest
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
