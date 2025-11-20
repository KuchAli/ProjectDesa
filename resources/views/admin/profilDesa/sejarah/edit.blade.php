@extends('admin.layouts.main')

@section('title', 'Edit Sejarah Desa')

@section('admin-content')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Edit Sejarah Desa</h2>

        <a href="{{ route('admin.profilDesa.sejarah.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ada kesalahan input:</strong>
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('admin.profilDesa.sejarah.update', $sejarah->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Sejarah Desa</label>
                    <textarea name="sejarah" class="form-control" rows="7" required>{{ old('sejarah', $sejarah->sejarah) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success mt-3">
                    Update
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
