@extends('layout.app')

@section('title', 'Dashboard Pembeli')

@section('content')
<div class="container py-4">
    <div class="row">
        {{-- Navbar Pembeli --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid px-4 px-lg-5">
                <a class="navbar-brand" href="#!"><img src="{{ asset('images/logo (1).png') }}" alt="" class="m-2" style="height: 50px; width: auto;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                
                <div class="collapse navbar-collapse mb-2 mb-lg-0 ms-lg-4" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        </ul>
                    
                </div>
            </div>
        </nav>


        {{-- Sidebar Pembeli --}}
        <div class="col-md-3 mb-3">
            <div class="list-group">
                <a href="{{ route('umkm.buyer.index') }}" class="list-group-item list-group-item-action {{ request()->is('umkm/buyer') ? 'active' : '' }}">
                    🏠 Beranda
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="list-group-item btn btn-outline-danger">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Konten Utama --}}
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="mb-3">Selamat datang, {{ Auth::user()->name ?? 'Pembeli' }}!</h4>
                    <p>Temukan berbagai produk UMKM unggulan Desa Serang di sini.</p>

                    {{-- Slot konten dinamis --}}
                    @yield('buyer-content')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
