@extends('admin.layouts.main')

@section('title', 'Kategori Produk')

@section('admin-content')
<div class="container-fluid">
    <h1 class="fw-bold fs-2 mb-4">Kategori Produk</h1>

    <div class="row g-4 justify-content-center">
        @forelse($categories as $kategori)
        <!-- Card UMKM -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h4 class="fw-bold mb-4">{{ $kategori->name }}</h4>
                    <h5 class="fs-5"><span class="me-2">Jumlah Produk:</span> {{ $kategori->products_count }}</h5>
                </div>
            </div>
        @empty
            <p>Tidak ada kategori.</p>
        @endforelse
        {{ $categories->links() }}
    </div>
    @forelse($categories as $category)

        <!-- Judul Kategori -->
        <h2 class="mt-5  fs-4 ">{{ $category->name }}</h2>

        @if($category->products->isEmpty())
            <p class="text-muted">Belum ada produk di kategori ini.</p>
        @else
            <div class="row g-4">
                @foreach($category->products as $product)
                    <!-- Card Produk -->
                    <div class="col-md-3">
                        <div class="card shadow-sm h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height:200px; object-fit:cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-success fw-bold">Rp {{ number_format($product->price,0,',','.') }}</p>
                                <p class="card-text text-muted">Penjual: {{ $product->user->name ?? 'Unknown' }}</p>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @empty
        <p>Tidak ada kategori.</p>
    @endforelse
    <div class="d-flex justify-content-center mt-3">
        {{ $categories->links() }}
    </div>
</div>
@endsection
