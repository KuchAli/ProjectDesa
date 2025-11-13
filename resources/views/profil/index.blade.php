@extends('layout.app')

@section('title', 'Profil Desa Serang')


@section('content')
    <section class="hero-banner p-5 text-white text-center d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('images/home-bg.jpg') }}'); background-size: cover; background-position: center; margin: 0; padding: 0; min-height: 400px;">
        <div class="container position-relative " style="z-index: 1;">
            <h1 class="display-4 fw-bolder">Profil Desa Serang</h1>
            <p class="lead">Temukan Informasi Lengkap tentang Desa Serang di sini.</p>
        </div>
    </section>

    <section id="visi-misi" class="shadow-sm ">
        @include('.profil.visi-misi')
    </section>

    <section id="bagan" class="shadow-sm ">
        @include('.profil.bagan')
    </section>
    
    <section id="sejarah" class="shadow-sm ">
        @include('.profil.sejarah')
    </section>
    
    <section id="lokasi" class="shadow-sm ">
        @include('profil.lokasi')
    </section>

    <!-- Load Google Maps API dengan callback ke fungsi initMaps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&callback=initMaps" async defer></script>

    <script>
        // Function untuk initialize semua maps
        function initMaps() {
            // Panggil function initMap untuk masing-masing map
            if(typeof initMapprofil === 'function') {
                initMapprofil();
            }
            
            // Tambahkan map lainnya jika ada
            if(typeof initMapdefault === 'function') {
                initMapdefault();
            }
        }
    </script>


<style>
    body {
        background: #bcfce0;
    }
</style>

@endsection