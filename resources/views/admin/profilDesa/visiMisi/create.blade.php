@extends('admin.layouts.main')

@section('title', 'Tambah Visi & Misi')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tambah Visi & Misi</h2>

        <a href="{{ route('admin.profilDesa.visiMisi.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali inputan Anda:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.profilDesa.visiMisi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- VISI --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Visi</label>
                    <textarea name="visi" class="form-control" rows="4" required>{{ old('visi') }}</textarea>
                </div>

                {{-- MISI --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Misi</label>
                    <textarea name="misi" class="form-control" rows="5" required>{{ old('misi') }}</textarea>
                </div>

                

                <button type="submit" class="btn btn-success mt-3">
                    Simpan
                </button>

            </form>

        </div>
    </div>
</div>
@endsection
