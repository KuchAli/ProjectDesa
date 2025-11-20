<aside class="main-sidebar">
    <div class="brand-section">
        <span class="brand-text">Admin Panel</span>
    </div>

    <nav class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="has-dropdown {{ request()->is('admin/profil-desa*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="dropdown-toggle">
                    <i class="bi bi-building"></i>
                    <span>Profil Desa</span>
                    <i class="bi bi-caret-down-fill ms-auto"></i>
                </a>
                <ul class="dropdown-menu {{ request()->is('admin/profil-desa*') ? 'show' : '' }} " style="background-color: #023c0e;">
                    <li>
                        <a href="{{ route('admin.profilDesa.visiMisi.index') }}" class="{{ request()->is('admin/profil-desa/visi-misi*') ? 'active' : '' }}">Visi Misi</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.profilDesa.bagan.index') }}" class="{{ request()->is('admin/profil-desa/bagan*') ? 'active' : '' }}   ">Bagan</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.profilDesa.sejarah.index') }}" class="{{ request()->is('admin/profil-desa/sejarah*') ? 'active' : '' }}">Sejarah</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.umkm.index') }}" class="{{ request()->is('admin/umkm*') ? 'active' : '' }}">
                    <i class="bi bi-bag"></i>
                    <span>UMKM</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.kategori.index') }}" class="{{ request()->is('admin/kategori*') ? 'active' : '' }}">
                    <i class="bi bi-tags"></i>
                    <span>Kategori UMKM</span>
                </a>
            </li>   
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Manajemen User</span>
                </a>
            </li>

            <li class="menu-divider"></li>

            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>

<style>
    .main-sidebar {
        width: 250px;
        height: 100vh;
        background-color: #023c0e;
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        color: #c2c7d0;
        border-right: 1px solid #343a40;
    }

    .brand-section {
        padding: 20px;
        background: #02270a;
        text-align: center;
        font-size: 20px;
        font-weight: 700;
        color: #fff;
        border-bottom: 1px solid #2d3138;
    }

    .sidebar-menu {
        padding: 15px 10px;
    }

    .sidebar-menu ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .sidebar-menu ul li {
        margin-bottom: 6px;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        border-radius: 6px;
        text-decoration: none;
        color: #c2c7d0;
        font-size: 15px;
        transition: 0.2s;
    }

    .sidebar-menu a:hover {
        background: #3a3f51;
        color: #fff;
    }

    .sidebar-menu a i {
        font-size: 18px;
    }

    .sidebar-menu .active {
        background:  #02270a !important;
        color: #fff !important;
    }

    .menu-divider {
        border-top: 1px solid #4b4f5c;
        margin: 15px 0;
    }
</style>
