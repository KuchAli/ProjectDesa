@extends('layout.app')
@section('content')

@section('content')
    {{-- Hero Section --}}
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            {{-- Slide 1 --}}
            <div class="carousel-item active">
                <div class="hero-bg" style="background-image: url('{{ asset('images/home-bg.jpg') }}');">
                    <div class="overlay d-flex flex-column justify-content-center align-items-center text-center text-white">
                        <h1 class="fw-bold display-4 mb-3 animate__animated animate__fadeInDown">Selamat Datang</h1>
                        <h2 class="fw-bold mb-3 animate__animated animate__fadeInUp">Website Resmi Desa Serang</h2>
                        <p class="lead animate__animated animate__fadeIn">Sumber informasi terbaru tentang pemerintahan dan layanan publik di Desa Serang</p>
                    </div>
                </div>
            </div>

            {{-- Slide 2 --}}
            <div class="carousel-item">
                <div class="hero-bg" style="background-image: url('{{ asset('images/home-bg.jpg') }}');">
                    <div class="overlay d-flex flex-column justify-content-center align-items-center text-center text-white">
                        <h1 class="fw-bold display-4 mb-3">Informasi Desa</h1>
                        <p class="lead">Layanan publik, kegiatan warga, dan potensi UMKM Desa Serang</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Navigasi --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    {{-- Section Pintasan --}}
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Pintasan Informasi</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body">
                            <i class="bi bi-person-badge display-4 text-success"></i>
                            <h5 class="mt-3 fw-bold">Profil Desa</h5>
                            <p class="small text-muted">Sejarah, visi misi, dan struktur organisasi.</p>
                            <a href="{{ route('profil') }}" class="btn btn-success btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm h-100 border-0 hover-card">
                        <div class="card-body">
                            <i class="bi bi-shop display-4 text-success"></i>
                            <h5 class="mt-3 fw-bold">UMKM Desa</h5>
                            <p class="small text-muted">Produk unggulan dari masyarakat Desa Serang.</p>
                            <a href="{{ route('umkm.index') }}" class="btn btn-success btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sambutan-kades py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Gambar di sebelah kiri -->
                <div class="col-md-4 text-center">
                    @if ($data->image)
                        <img src="{{ asset('storage/' . $data->image) }}" 
                            alt="{{ $data->nama }}" 
                            class="rounded-circle border border-3 mb-3" 
                            style="width: 390px; height: 380px; object-fit: cover;">
                    @else
                        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/fallback-B6dzNJxy.png" 
                            alt="{{ $data->nama }}" 
                            class="rounded-circle border border-3 mb-3" 
                            style="width: 400px; height: 380px; object-fit: cover;">
                    @endif
                </div>

                <!-- Teks di sebelah kanan -->
                <div class="col-md-8">
                    <h3 class="text-success fw-bold mb-3" style="font-size: 2rem;">
                        Sambutan Kepala Desa Serang
                    </h3>
                    <p class="fw-bold mb-1 fs-5">{{ $data->nama }}</p>
                    <p class="text-muted mb-3">Kepala Desa</p>
                    <p class="text-start">
                        {{ $data->sambutan }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-0 bg-light" style="margin: 0; padding: 0;"> <!-- Ganti py-5 jadi py-0 -->
        <div class="hero-bg" style="background-image: url('{{ asset('images/home-bg.jpg') }}'); margin: 0; padding: 0;">
            <div class="overlay d-flex flex-column justify-content-center align-items-center text-center text-white gap-3" style="margin: 0; padding: 0;">
                <h1 class="mb-0">UMKM- Toko Desa Serang</h1> <!-- Tambahkan mb-0 -->
                <a href="{{ route('umkm.index') }}" class="btn btn-success mt-2">Lihat Selengkapnya</a> <!-- Tambahkan mt-2 -->
            </div>
        </div>
    </section>

@endsection


@push('styles')
<style>
    .hero-bg {
        position: relative;
        height: 100vh; /* Full screen */
        background-size: cover;
        background-position: center;
    }

    .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        padding: 0 20px;
    }

    .hover-card {
        transition: all 0.3s ease;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>
@endpush

@endsection