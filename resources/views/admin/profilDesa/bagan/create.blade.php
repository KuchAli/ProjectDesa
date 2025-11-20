@extends('admin.layouts.main')

@section('title', 'Tambah Bagan Organisasi')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Bagan Organisasi</h2>

        <a href="{{ route('admin.profilDesa.bagan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Harap periksa kembali:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.profilDesa.bagan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- SLUG --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Slug Bagan</label>
                    <input type="text" name="bagan_slug" class="form-control"
                           placeholder="contoh: bagan-struktur-desa"
                           value="{{ old('bagan_slug') }}" required>
                </div>

                {{-- GAMBAR --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Gambar Bagan</label>
                    <input type="file" name="image_bagan" class="form-control" accept="image/*" required>
                    <small class="text-muted">Format: JPG, PNG (Maks 2MB)</small>
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    Simpan
                </button>

            </form>

        </div>
    </div>
</div>
@endsection
