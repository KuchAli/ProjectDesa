@extends('layout.seller')
@section('title', 'Dashboard Penjual')
@section('seller-content')
    <div class="content">
        <h2 class="mb-4">Daftar Produk</h2>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('umkm.seller.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td><img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : 'https://via.placeholder.com/100' }}" alt="{{ $item->name }}" width="100"></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection