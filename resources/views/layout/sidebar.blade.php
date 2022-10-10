<!-- Side Nav START -->
<div class="side-nav vertical-menu nav-menu-light scrollable">
    <div class="nav-logo">
        <div class="w-100 logo">
            <h3>Cek Terminal</h3>
            {{-- <img class="img-fluid" src="/assets/images/logo/logo.png" style="max-height: 70px;" alt="logo"> --}}
        </div>
        <div class="mobile-close">
            <i class="icon-arrow-left feather"></i>
        </div>
    </div>
    <ul class="nav-menu">
        <li class="nav-menu-item router-link-active">
            <a href="/">
                <i class="feather icon-home"></i>
                <span class="nav-menu-item-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-group-title">Data Terminal</li>
        <li class="nav-menu-item">
            <a href="terminals">
                <i class="feather icon-file-text"></i>
                <span class="nav-menu-item-title">Terminal</span>
            </a>
        </li>
        <li class="nav-menu-item">
            <a href="/inputdata">
                <i class="feather icon-calendar"></i>
                <span class="nav-menu-item-title">Input Data</span>
            </a>
        </li>
        <li class="nav-menu-item">
            <a href="/rekapdata">
                <i class="feather icon-package"></i>
                <span class="nav-menu-item-title">Rekap Laporan</span>
            </a>
        </li>

        <li class="nav-group-title">Data Pelabuhan</li>
        <li class="nav-menu-item">
            <a href="/pelabuhans">
                <i class="feather icon-grid"></i>
                <span class="nav-menu-item-title">Pelabuhan</span>
            </a>
        </li>
        <li class="nav-menu-item">
            <a href="/inputpelabuhan">
                <i class="feather icon-box"></i>
                <span class="nav-menu-item-title">Input Data</span>
            </a>
        </li>

        <li class="nav-submenu">
            <a class="nav-submenu-title">
                <i class="feather icon-bar-chart"></i>
                <span>Rekap Pelabuhan</span>
                <i class="nav-submenu-arrow"></i>
            </a>
            <ul class="nav-menu menu-collapse">
                @foreach (App\Models\Pendataanpelabuhan::all() as $item)
                <li class="nav-menu-item">
                    <a href="/datapelabuhan/{{ $item->id }}">{{ $item->nama_pelabuhan }}</a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
</div>
<!-- Side Nav END -->