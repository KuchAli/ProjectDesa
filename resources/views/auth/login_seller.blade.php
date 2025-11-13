@extends('layout.app')

@section('title', 'Login Penjual')

@section('content')
<div class="container py-5" style="max-width: 500px;">
    <h3 class="text-center mb-4">Masuk Sebagai Penjual</h3>

    <form method="POST" action="{{ route('login.seller') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>

    <p class="mt-3 text-center">
        Belum punya akun? <a href="{{ route('register.seller') }}">Daftar sebagai Penjual</a>
    </p>
</div>
@endsection
