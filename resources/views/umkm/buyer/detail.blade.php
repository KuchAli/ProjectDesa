@extends('layout.buyer')

@section('title', 'Detail Produk UMKM Desa Serang')

@section('buyer-content')

<div class="container py-4">

    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $products->image) }}"
                 class="img-fluid rounded" style="max-height: 400px; object-fit: cover;"
                 alt="{{ $products->name }}">
        </div>

        <div class="col-md-6">

            <h2>{{ $products->name }}</h2>

            <h4 class="text-success">
                Rp {{ number_format($products->price, 0, ',', '.') }}
            </h4>

            <p class="mt-3">{{ $products->description }}</p>

            @php
                $phone = $products->seller->phone ?? null;

                if ($phone) {
                    $phone = preg_replace('/^0/', '62', $phone);
                }

                $pesan = urlencode("Halo, saya ingin bertanya tentang produk *{$products->name}*.");
                $waLink = $phone ? "https://wa.me/$phone?text=$pesan" : "#";
            @endphp

            <div class="mt-4 d-flex gap-2">

                <a href="{{ route('umkm.buyer.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                @if($waLink)
                <a href="{{ $waLink }}"
                   target="_blank"
                   class="btn btn-success">
                    Hubungi Penjual
                </a>
                @else
                <button class="btn btn-secondary" disabled>
                    Nomor Penjual Tidak Tersedia
                </button>
                @endif

            </div>

        </div>
    </div>
    
</div>
@endsection
