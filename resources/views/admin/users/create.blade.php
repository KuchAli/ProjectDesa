@extends('admin.layouts.main')
@section('title', 'Tambah Pengguna')
@section('admin-content')

<div class="container">
    <h1 class="fw-bold fs-2">Tambah Pengguna</h1>
    <span class="fs-5 fw-italic">Gunakan form di bawah untuk menambahkan pengguna baru ke dalam sistem.</span>
    <hr>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="seller">Seller</option>
                <option value="buyer">Buyer</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>

</div>

@endsection
