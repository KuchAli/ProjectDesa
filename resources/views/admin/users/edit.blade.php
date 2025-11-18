@extends('admin.layouts.main')
@section('title', 'Edit User')
@section('admin-content')

<div class="container">
    <h1 class="fw-bold fs-2">Edit Pengguna</h1>
    <span class="fs-5 fw-italic">Gunakan form di bawah untuk mengedit informasi pengguna.</span>
    <hr>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="seller" {{ $user->role=='seller' ? 'selected' : '' }}>Seller</option>
                <option value="buyer" {{ $user->role=='buyer' ? 'selected' : '' }}>Buyer</option>
            </select>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>

@endsection
