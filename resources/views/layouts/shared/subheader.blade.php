<!-- BEGIN: Main Menu-->
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            @role('super-admin')
                <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown">
                        <i class="feather icon-settings"></i>
                        <span data-i18n="Dashboard">Maestros</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li data-menu="">
                            <a class="dropdown-item" href="{{ route('user.index') }}" data-i18n="eCommerce" data-toggle="dropdown">Users</a>
                        </li>
                        <li data-menu="">
                            <a class="dropdown-item" href="{{ route('roles.index') }}" data-i18n="eCommerce" data-toggle="dropdown">Roles</a>
                        </li>
                        <li data-menu="">
                            <a class="dropdown-item" href="{{ route('permisos.index') }}" data-i18n="eCommerce" data-toggle="dropdown">Permisos</a>
                        </li>
                    </ul>
                </li>
            @endrole
            @permission('cartera.ver')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cartera.index') }}">
                        <i class="feather icon-pocket"></i>
                        <span data-i18n="Dashboard">Cartera</span>
                    </a>
                </li>
            @endpermission

            @permission('reportes.menu')
                <li class="dropdown nav-item" data-menu="dropdown">
                    <a class="dropdown-toggle nav-link" href="index.html" data-toggle="dropdown">
                        <i class="feather icon-file-text"></i>
                        <span data-i18n="Dashboard">Reportes</span>
                    </a>
                    <ul class="dropdown-menu">
                        @permission('reportes.nomina')
                            <li data-menu="">
                                <a class="dropdown-item" href="{{ route('reportes.nomina1') }}" data-i18n="eCommerce" data-toggle="dropdown">Reporte Nomina</a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{ route('reportes.nomina2') }}" data-i18n="eCommerce" data-toggle="dropdown">Conceptos duplicados</a>
                            </li>
                        @endpermission
                        @permission('reportes.rrhh')
                            <li data-menu="">
                                <a class="dropdown-item" href="{{ route('reportes.rrhh1') }}" data-i18n="eCommerce" data-toggle="dropdown">Cumpleaños</a>
                            </li>
                            <li data-menu="">
                                <a class="dropdown-item" href="{{ route('reportes.rrhh2') }}" data-i18n="eCommerce" data-toggle="dropdown">Permisos Aprobados</a>
                            </li>
                        @endpermission
                    </ul>
                </li>
            @endpermission
        </ul>
    </div>
    <!-- /horizontal menu content-->
</div>
<!-- END: Main Menu-->
