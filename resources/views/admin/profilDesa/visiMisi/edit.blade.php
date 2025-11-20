@extends('admin.layouts.main')

@section('title', 'Edit Visi & Misi')

@section('admin-content')
<div class="container-fluid">

    <h1 class="fw-bold fs-3 mb-4">Edit Visi & Misi</h1>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.profilDesa.visiMisi.update', $visiMisis->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- VISI --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Visi</label>
                <textarea name="visi" class="form-control" rows="5" required>{{ old('visi', $visiMisis->visi) }}</textarea>
            </div>

            {{-- MISI --}}
            <div class="mb-5">
                <label class="form-label fw-semibold">Misi</label>
                <textarea name="misi" class="form-control" rows="5" required>{{ old('misi', $visiMisis->misi) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success px-4 me-3">Simpan Perubahan</button>
            <a href="{{ route('admin.profilDesa.visiMisi.index') }}" class="btn btn-secondary px-4 ">Kembali</a>
        </form>
    </div>

</div>
@endsection
