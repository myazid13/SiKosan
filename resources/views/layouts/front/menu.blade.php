<div class="horizontal-menu-wrapper ">
    <div class="header-navbar navbar-expand navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">SiKosan</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                <li data-menu="">
                  <a href="/" data-i18n="Dashboard">
                    <i class="feather icon-home"></i>SiKosan</a>
                </li>

                <li data-menu="">
                  <a href="/" data-i18n="Dashboard">
                    <i class="feather icon-help-circle"></i>Populer</a>
                </li>
                <li data-menu="">
                  <a href="/" data-i18n="Dashboard">
                    <i class="feather icon-book"></i>Terbaru</a>
                </li>

                <li data-menu="">
                  <a href="{{url('show-all-room')}}" data-i18n="Dashboard">
                    <i class="feather icon-calendar"></i>Booking Kamar</a>
                </li>

                    {{-- <li class="nav-item ">
                        <a class="nav-link nav-link-label" href="{{route('login')}}">
                         <i class="feather icon-log-in "></i> <span class=" mr-2">Masuk</span></a>
                      </li> --}}
 {{-- <li class="nav-item float-right">
                        <a class="nav-link btn btn-primary btn-inline float-right" href="{{route('login')}}">
                         <i class="feather icon-log-in btn-inline"></i> <span class=" btn-inline">Masuk</span></a>
                      </li>

                       <li class="nav-item">
                        <a class="nav-link btn btn-primary btn-inline float-right" href="{{route('register')}}">
                         <i class="feather icon-log-in btn-inline"></i> <span class=" btn-inline">Daftar</span></a>
                      </li> --}}
            </ul>

        </div>
    </div>
</div>
