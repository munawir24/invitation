<nav class="main-header navbar navbar-expand navbar-success navbar-light border-bottom-0" style="border-bottom-left-radius: 5px; border-bottom-right-radius: 5px">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="color: white;"><i
                    class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="nav-link">
                <div class="slider-mode">
                    <input type="checkbox" id="mode-switch" class="mode-switch">
                    <label for="mode-switch" class="mode-label"></label>
                </div>
            </div>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="color: white;">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li> --}}
        <li class="nav-item" hidden>
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"
                style="color: white;">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown user-menu dropdown-hover">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{ asset('pictures/user/' . Auth::user()->foto) }}" class="user-image img-circle elevation-3"
                        alt="{{ Auth::user()->name }}">
                    <span class="d-none d-md-inline text-white">
                        {{ Auth::user()->name }}
                    </span>
                    <i class="fas fa-caret-down text-white"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px; border-top-left-radius: 5px; border-top-right-radius: 5px">
                    <li class="user-header bg-teal rounded-top">
                        <img src="{{ asset('pictures/user/' . Auth::user()->foto) }}" class="img-circle elevation-2"
                            alt="{{ Auth::user()->name }}">
                        <p>
                            {{ Auth::user()->name }}
                            <small> </small>
                            {{ Auth::user()->level }}
                        </p>
                    </li>
                    <li class="user-footer rounded-sm">
                        <a href=""
                            class="btn btn-default btn-flat bg-primary rounded-sm">
                            <i class="fa fa-fw fa-user text-light"></i>
                            Profile
                        </a>
                        <a class="btn btn-default btn-flat float-right bg-warning rounded-sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-power-off text-red"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <!-- <input type=" hidden" name="_token" value="U3m2QMDARSqPpCdmkaqRgG3HWyJQOZ8IPTRbeiog"> -->
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
    </ul>
</nav>
