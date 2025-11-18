@extends('layout.app')

@section('title', 'Login Admin')

@section('content')
<div class="container py-5 " style="max-width: 500px;">
    <h3 class="text-center mb-4">Masuk Sebagai Admin</h3>

    <form method="POST" action="{{ route('admin.login.process') }}">
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
</div>
@endsection