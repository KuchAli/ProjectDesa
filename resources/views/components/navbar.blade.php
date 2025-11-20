

<nav class="navbar navbar-expand-lg navbar-dark  py-2" style="background-color: #02390e">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://cdn.digitaldesa.com/uploads/profil/32.06.14.2002/common/300_tasikmalaya.png" alt="Logo Desa" class="me-2" style="height: 50px; width: auto;">
            <div>
                <strong>Desa Serang</strong><br>
                <small>Kabupaten Tasikmalaya</small>
            </div>
        </a>  <!-- Toggler -->
        <!-- Tombol Toggle (Hamburger) -->
        <button class="navbar-toggler border-0" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fs-4 gap-3 fw-bold ">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('profil') }}" class="nav-link {{ request()->is('profil') ? 'active' : '' }}">Profil Desa</a></li>
                <li class="nav-item"><a href="{{ route('listing') }}" class="nav-link {{ request()->is('listing') ? 'active' : '' }}">Listing</a></li>
                <li class="nav-item"><a href="{{ route('umkm.index') }}" class="nav-link {{ request()->is('umkm') ? 'active' : '' }}">UMKM</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{  request()->is('admin/login') ? 'active' : '' }}" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Masuk</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('admin.login') }} ">Admin</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

