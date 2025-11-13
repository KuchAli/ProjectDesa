@extends('layout.app')

@section('title', 'UMKM Desa Serang')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-success">UMKM Desa Serang</h2>
        <p class="text-muted">Temukan dan kelola produk unggulan dari pelaku UMKM Desa Serang.</p>
    </div>

    <div class="row justify-content-center">
        {{-- Kartu Pembeli --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://cdn-icons-png.freepik.com/256/9518/9518642.png?semt=ais_white_label" alt="Pembeli" class="mb-3" width="120">
                    <h5 class="fw-bold">Masuk sebagai Pembeli</h5>
                    <p class="text-muted small">Lihat berbagai produk UMKM lokal dan dukung usaha warga Desa Serang.</p>
                    <a href="{{ route('login.buyer') }}" class="btn btn-outline-success mt-2">Lanjut ke Pembeli</a>
                </div>
            </div>
        </div>

        {{-- Kartu Penjual --}}
        <div class="col-md-4 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFxEFfdNvUUlYpLAvrY9B-6kCupmm8LavEsw&s" alt="Penjual" class="mb-3" width="120">
                    <h5 class="fw-bold">Masuk sebagai Penjual</h5>
                    <p class="text-muted small">Kelola produk, lihat pesanan, dan promosikan usaha UMKM Anda.</p>
                    <a href="{{ route('login.seller') }}" class="btn btn-outline-success mt-2">Lanjut ke Penjual</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
