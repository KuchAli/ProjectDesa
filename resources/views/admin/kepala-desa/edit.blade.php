@extends('admin.layouts.main')

@section('title', 'Edit Kepala Desa')



@section('admin-content')
<div class="container">
    <h2>Edit Kepala Desa</h2>

    <form action="{{ route('admin.kepala-desa.update', $kepalaDesa->id) }}" 
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Kepala Desa</label>
            <input type="text" name="nama" class="form-control" value="{{ $kepalaDesa->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Sambutan</label>
            <textarea name="sambutan" class="form-control" rows="5">{{ $kepalaDesa->sambutan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            @if($kepalaDesa->image)
                <img src="{{ asset('storage/' . $kepalaDesa->image) }}" width="150" class="mb-2">
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success mt-2">Update</button>
        <a href="{{ route('admin.kepala-desa.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
    
</div>
@endsection
