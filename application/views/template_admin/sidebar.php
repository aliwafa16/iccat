<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="background-color:#efefef !important">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/') ?>images/logo.png">
        </div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>Dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Area Client
    </div>
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Bootstrap UI</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bootstrap UI</h6>
                <a class="collapse-item" href="alerts.html">Alerts</a>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="dropdowns.html">Dropdowns</a>
                <a class="collapse-item" href="modals.html">Modals</a>
                <a class="collapse-item" href="popovers.html">Popovers</a>
                <a class="collapse-item" href="progress-bar.html">Progress Bars</a>
            </div>
        </div>
    </li> -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Clients') ?>">
            <i class="fas fa-fw fa-palette"></i>
            <span>Clients</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Events') ?>">
            <i class="fas fa-fw fa-palette"></i>
            <span>Events</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Transactions') ?>">
            <i class="fas fa-fw fa-palette"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Reports') ?>">
            <i class="fas fa-fw fa-palette"></i>
            <span>Reports</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Master data
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Behaviors') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Perilaku</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Competences') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Kompetensi</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>