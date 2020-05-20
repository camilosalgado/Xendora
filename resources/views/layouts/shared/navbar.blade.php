<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-gradient-x-grey-blue navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="html/ltr/horizontal-menu-template-nav/index.html"><img class="brand-logo" alt="stack admin logo" src="app-assets/images/logo/stack-logo-light.png">
                        <h2 class="brand-text">Xendora</h2>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="feather icon-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon feather icon-search"></i></a>
                        <div class="search-input">
                            <input class="input" type="text" placeholder="Explore Stack..." tabindex="0" data-search="template-search">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list"></ul>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="avatar avatar-online"><img src="app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></div><span class="user-name">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="user-profile.html"><i class="feather icon-user"></i> Perfil</a>
                            @permission('maestros.menu')
                                <a class="dropdown-item" href="{{ route('roles.index') }}"><i class="feather icon-check-square"></i> Roles</a>
                            <a class="dropdown-item" href="{{ route('permisos.index') }}"><i class="feather icon-mail"></i> Permisos</a>

                            @endpermission
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                              <i class="feather icon-power"></i>
                              Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
