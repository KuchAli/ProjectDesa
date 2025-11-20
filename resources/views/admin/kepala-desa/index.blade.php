@extends('admin.layouts.main')

@section('title', 'Kepala Desa')

@section('admin-content')
<div class="container mt-4">

    <h2 class="fw-bold mb-4">Data Kepala Desa</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($data)
        <!-- Data Sudah Ada -->
        <div class="card shadow-sm p-4">

            <div class="row">
                <div class="col-md-3">
                    @if ($data->image)
                        <img src="{{ asset('storage/' . $data->image) }}" class="img-fluid rounded shadow-sm">
                    @else
                        <img src="https://via.placeholder.com/300x300?text=Kepala+Desa" class="img-fluid rounded">
                    @endif
                </div>

                <div class="col-md-9">
                    <h4 class="fw-bold">{{ $data->nama }}</h4>
                    <p class="text-muted">Jabatan: <strong>Kepala Desa</strong></p>

                    <div class="mt-3">
                        <h5 class="fw-bold">Sambutan:</h5>
                        <p>{{ $data->sambutan }}</p>
                    </div>

                    <a href="{{ route('admin.kepala-desa.edit', $data->id) }}" class="btn btn-success mt-3">
                        Edit Data
                    </a>

                </div>
            </div>

        </div>

    @else
        <!-- Jika Belum Ada Data -->
        <div class="text-center mt-5">
            <h4>Belum ada data Kepala Desa</h4>
            <a href="{{ route('admin.kepala-desa.create') }}" class="btn btn-success mt-3">
                + Tambah Kepala Desa
            </a>
        </div>
    @endif

</div>
@endsection
