@extends('admin.layouts.main')

@section('title', 'UMKM Admin')

@section('admin-content')
<div class="container-fluid">
    <h1 class="fw-bold fs-2 mb-4">Daftar UMKM</h1>
    <span class="fs-5 fw-italic">Berikut adalah daftar produk UMKM yang terdaftar dalam sistem.</span>
    <hr class="mb-4">
    @forelse($sellers as $seller)
        <div class="card mb-4">
            <div class="card-header">
                <h3><span class="me-3">Penjual:</span>{{ $seller->name }}</h3>
                <p>Email: {{ $seller->email }}</p>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @forelse($seller->products as $product)
                        <div class="col-md-3">
                            <div class="card h-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 300px;">
                                @else
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-success fw-bold">Rp {{ number_format($product->price,0,',','.') }}</p>
                                    <form action="{{ route('admin.umkm.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Penjual belum memiliki produk.</p>
                    @endforelse
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $sellers->links() }}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada penjual terdaftar.</p>
    @endforelse
</div>
@endsection
