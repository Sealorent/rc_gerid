<nav class="pcoded-navbar mt-2">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::segment(1) == 'admin-panel' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>
                </li>
            </ul>
            <div class="pcoded-navigation-label">Master Data</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ Request::segment(1) == 'bank-data' ? 'active' : '' }}">
                    <a href="{{ route('bank-data.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-folder"></i>
                        </span>
                        <span class="pcoded-mtext">Bank Data</span>
                    </a>
                </li>
                <li class="{{ Request::segment(1) == 'data-spasial' ? 'active' : '' }}">
                    <a href="{{ route('data-spasial.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-globe"></i>
                        </span>
                        <span class="pcoded-mtext">Data Spasial</span>
                    </a>
                </li>
                <li class="{{ Request::segment(1) == 'pengarang' ? 'active' : '' }}">
                    <a href="{{ route('pengarang.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clipboard"></i>
                        </span>
                        <span class="pcoded-mtext">Data Penulis</span>
                    </a>
                </li>
                <li class="{{ Request::segment(1) == 'pengarang' ? 'active' : '' }}">
                    <a href="{{ route('kasus.index') }}" class="waves-effect waves-dark">
                        <span class="pcoded-micon">
                            <i class="fa fa-clipboard"></i>
                        </span>
                        <span class="pcoded-mtext">Data Kasus</span>
                    </a>
                </li>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="pcoded-hasmenu {{ Request::segment(1) == 'menu' ? 'active pcoded-trigger' : '' }}">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="feather icon-list"></i></span>
                            <span class="pcoded-mtext">Menu</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{ Request::segment(2) == 'virus' ? 'active' : '' }}">
                                <a href="{{ route('virus.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Virus</span>
                                </a>
                            </li>
                            <li class="{{ Request::segment(2) == 'genotipe' ? 'active' : '' }}">
                                <a href="{{ route('genotipe.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Genotipe & Subtype</span>
                                </a>
                            </li>
                            <li class="{{ Request::segment(2) == 'transmisi' ? 'active' : '' }}">
                                <a href="{{ route('transmisi.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Transmisi</span>
                                </a>
                            </li>
                            <li class="{{ Request::segment(2) == 'kelompok-umur' ? 'active' : '' }}">
                                <a href="{{ route('kelompok-umur.index') }}" class="waves-effect waves-dark">
                                    <span class="pcoded-mtext">Kelompok Umur</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
