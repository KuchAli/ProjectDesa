@extends('layout.app')

@section('title', 'Dashboard Penjual')

@section('content')
<div class="container py-4">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <!-- Navbar Brand-->
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="{{ asset('images/logo (1).png') }}" alt="" class="m-2" style="height: 50px; width: auto;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
               
            </div>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>


        <!-- Side navigation-->
        <div class="col-md-3 mb-3 mt-4">
            <div class="list-group">
                <a href="{{ route('umkm.seller.index') }}" class="list-group-item list-group-item-action {{ request()->is('umkm/seller') ? 'active' : '' }}">🏠 Dashboard</a>
            </div>
        </div>

        
        {{-- Konten Utama --}}
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="mb-3">Selamat datang, {{ Auth::user()->name ?? 'Pembeli' }}!</h4>
                    <p>Jual berbagai produk UMKM Untuk Desa Serang di sini.</p>
                    <hr>

                    {{-- Slot konten dinamis --}}
                    @yield('seller-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection