@extends('layout.buyer')
@section('title', 'Beli Produk UMKM Desa Serang')

@section('buyer-content')

<div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

    @forelse ($products as $p)
    <div class="col mb-5">
        <div class="card h-100">

            <!-- GAMBAR -->
            <img class="card-img-top" style="height: 200px; object-fit: cover;"
                src="{{ $p->image ? asset('storage/'.$p->image) : 'https://dummyimage.com/450x300/dee2e6/6c757d.jpg' }}"
                alt="{{ $p->name }}">

            <div class="card-body p-4">
                <div class="text-center">
                    <h5 class="fw-bolder">{{ $p->name }}</h5>
                    Rp {{ number_format($p->price, 0, ',', '.') }}
                </div>
            </div>

            <!-- TOMBOL -->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                @php
                    $phone = $p->seller->phone ?? null;

                    if ($phone) {
                        $phone = preg_replace('/^0/', '62', $phone);
                    }

                    $pesan = urlencode("Halo, saya ingin bertanya tentang produk *{$p->name}*.");
                    $waLink = $phone ? "https://wa.me/$phone?text=$pesan" : "#";
                @endphp

                <div class="d-flex justify-content-center gap-2">
                    <a href="{{ route('umkm.buyer.products.detail', $p->id) }}" class="btn btn-outline-secondary btn-sm">Detail Produk</a>
                    <a class="btn btn-outline-success btn-sm {{ !$phone ? 'disabled' : '' }}"
                        href="{{ $waLink }}"
                        target="_blank"
                        style="{{ !$phone ? 'pointer-events:none;' : '' }}">
                            Hubungi Penjual
                    </a>

                </div>
            </div>

        </div>
    </div>
    @empty
        <p class="text-center">Belum ada produk tersedia.</p>
    @endforelse

</div>


@endsection
