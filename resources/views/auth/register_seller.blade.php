@extends('layout.app')

@section('title', 'Register Penjual')

@section('content')
<div class="container py-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Daftar Sebagai Penjual</h3>

    <form method="POST" action="{{ route('register.seller') }}">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
         <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Daftar</button>
    </form>
    <a href="{{ route('login.seller') }}" class="btn btn-outline-success mt-3">Kembali Ke Login</a>
</div>
@endsection
