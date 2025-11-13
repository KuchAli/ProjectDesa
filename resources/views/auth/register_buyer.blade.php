@extends('layout.app')

@section('title', 'Register Pembeli')

@section('content')
<div class="container py-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Daftar Sebagai Pembeli</h3>

    <form method="POST" action="{{ route('register.buyer') }}">
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
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Daftar</button>
    </form>
</div>
@endsection
