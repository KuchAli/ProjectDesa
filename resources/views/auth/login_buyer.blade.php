@extends('layout.app')

@section('title', 'Login Pembeli')

@section('content')
<div class="container py-5 " style="max-width: 500px;">
    <h3 class="text-center mb-4">Masuk Sebagai Pembeli</h3>

    <form method="POST" action="{{ route('login.buyer') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success w-100">Login</button>
    </form>

    <p class="mt-3 text-center">
        Belum punya akun? <a href="{{ route('register.buyer') }}">Daftar sebagai Pembeli</a>
    </p>
</div>
@endsection
