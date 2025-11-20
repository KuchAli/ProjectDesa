@extends('admin.layouts.main')

@section('title', 'Tambah Kepala Desa')

@section('admin-content')
<div class="container">
    <h2>Tambah Kepala Desa</h2>

    <form action="{{ route('admin.kepala-desa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Nama Kepala Desa</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Sambutan</label>
            <textarea name="sambutan" class="form-control" rows="5"></textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success mt-4">Simpan</button>
    </form>
</div>
@endsection
