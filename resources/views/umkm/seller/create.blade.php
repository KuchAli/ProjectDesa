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
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama produk" required>
                </div>

                {{-- HARGA --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" name="harga" placeholder="Masukkan harga produk" required>
                </div>

                {{-- STOK --}}
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" class="form-control" name="stok" placeholder="Masukkan jumlah stok" required>
                </div>

                {{-- KATEGORI --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $k)
                            <option value="{{ $k->id }}">{{ $k->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- DESKRIPSI --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4" placeholder="Tuliskan deskripsi produk..."></textarea>
                </div>

                {{-- GAMBAR PRODUK --}}
                <div class="mb-3">
                    <label class="form-label">Gambar Produk</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" onchange="previewImage(event)">
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