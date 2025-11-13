@extends('layout.seller')
@section('title', 'Dashboard Penjual')
@section('seller-content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4>Tambah Produk Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('umkm.seller.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NAMA PRODUK --}}
                <div class="text-center mb-3">
                <input type="text" class="form-control" name="name" placeholder="Masukkan nama produk" required>
                </div>

                {{-- HARGA --}}
                <div class="text-center mb-3">
                    <input type="number" class="form-control" name="price" placeholder="Masukkan harga produk" required>
                </div>

                {{-- STOK --}}
                <div class="text-center mb-3">
                    <input type="number" class="form-control" name="stock" placeholder="Masukkan jumlah stok" required>
                </div>

                {{-- KATEGORI --}}
                <div class="text-center mb-3">
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>
               

                {{-- DESKRIPSI --}}
                <div class="text-center mb-3">
                    <textarea name="description" class="form-control" rows="4" placeholder="Tuliskan deskripsi produk..."></textarea>
                </div>

                {{-- GAMBAR PRODUK --}}
                <div class="text-center mb-3">
                    <input type="file" class="form-control" name="image" accept="image/*">
                </div>

                {{-- PREVIEW GAMBAR --}}
                <div class="text-center mb-3">
                    <img id="preview" src="" class="img-fluid rounded shadow-sm" style="max-width: 250px; display: none;">
                </div>

                {{-- TOMBOL --}}
                <div class="text-end">
                    <a href="{{ route('umkm.seller.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- SCRIPT PREVIEW GAMBAR --}}
<script>
    function previewImage(event) {
        const imgPreview = document.getElementById('preview');
        imgPreview.style.display = 'block';
        imgPreview.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection