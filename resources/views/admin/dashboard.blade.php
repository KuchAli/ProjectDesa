@extends('admin.layouts.main')

@section('title', 'Dashboard Admin')

@section('admin-content')
    <!-- resources/views/admin/dashboard.blade.php -->
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-md-12">
                <h3>Selamat Datang, Admin!</h3>
                <p class="text-muted">Ini adalah dashboard pengelolaan sistem UMKM dan Profil Desa.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Card UMKM -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total UMKM</h5>
                    <h2>{{ $totalProduct ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card Produk -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Produk</h5>
                    <h2>{{ $totalProduct ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card User -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Pengguna</h5>
                    <h2>{{ $totalUser ?? 0 }}</h2>
                </div>
            </div>

            <!-- Card Listing -->
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-3">
                    <h5>Total Kategori</h5>
                    <h2>{{ $totalCategory ?? 0 }}</h2>
                </div>
            </div>
        </div>

        <h3 class="mt-4">Daftar Produk</h3>
        <div class="row">
            @forelse ($products as $p)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="{{ Storage::url($p->image) }}" 
                            class="card-img-top" alt="Produk" style="height: 350px;  ">

                        <div class="card-body">
                            <h5 class="card-title">{{ $p->name }}</h5>
                            <p class="text-success fw-bold">Rp {{ number_format($p->price, 0, ',', '.') }}</p>
                            <p class="text-muted">Penjual: {{ $p->user->name ?? 'Unknown' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Belum ada produk.</p>
            @endforelse
            
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>

        </div>
        <h3 class="mt-5">Daftar Pengguna</h3>

        <table class="table table-bordered mt-3">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        <span class="badge 
                            @if($u->role == 'admin') bg-primary
                            @elseif($u->role == 'seller') bg-success
                            @else bg-secondary @endif
                        ">
                            {{ ucfirst($u->role) }}
                        </span>
                    </td>
                    <td>{{ $u->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
            <div class="d-flex justify-content-center mt-3">
                {{ $users->links() }}
            </div>
        </table>


        <h3 class="mt-5">Daftar Kategori</h3>

        <table class="table table-bordered mt-3">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jumlah Produk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->products_count }}</td>
                </tr>
                @endforeach
            </tbody>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $categories->links() }}
            </div>
        </table>

    </div>
@endsection
