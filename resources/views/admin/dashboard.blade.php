@extends('admin.layouts.main')

@section('title', 'Dashboard Admin')

@section('admin-content')
    <!-- resources/views/admin/dashboard.blade.php -->
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-md-12">
                <h3>Selamat Datang, Admin!</h3>
                <p class="text-muted">Ini adalah dashboard pengelolaan sistem UMKM dan Profil Desa.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Card UMKM -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total UMKM</h5>
                    <h2>{{ $totalProduct ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card Produk -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Produk</h5>
                    <h2>{{ $totalProduct ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card User -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Pengguna</h5>
                    <h2>{{ $totalUser ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card Listing -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Kategori</h5>
                    <h2>{{ $totalCategory ?? 0 }}</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
