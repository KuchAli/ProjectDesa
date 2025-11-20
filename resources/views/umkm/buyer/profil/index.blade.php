@extends('layout.buyer') <!-- Sesuaikan layout dashboard buyer -->

@section('title', 'Profil Saya')

@section('buyer-content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Profil Saya</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center space-x-6">
        <!-- Foto Profil -->
        <div class="col-md-4 text-center">
            @if($profil->image_path)
                <img src="{{ asset('storage/' . $profil->image_path) }}" alt="Foto Profil" class="rounded-circle border border-3 mb-3" style="width: 400px; height: 380px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil Default" class="rounded-circle border border-3 mb-3" style="width: 400px; height: 380px; object-fit: cover;">
            @endif
        </div>

        <!-- Data Profil -->
        <div class="flex-1 card-body">
            <p><strong>Nama:</strong> {{ $profil->name }}</p>
            <p><strong>No HP:</strong> {{ $profil->phone ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $profil->address ?? '-' }}</p>
            <a href="{{ route('umkm.buyer.profil.edit', $profil->id) }}" class="mt-3 btn btn-outline-success">
                Edit Profil
            </a>
        </div>
    </div>
</div>
@endsection
