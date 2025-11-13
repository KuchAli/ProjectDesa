@extends('layout.seller') <!-- Sesuaikan layout dashboard seller -->

@section('title', 'Edit Profil')

@section('seller-content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Profil Saya</h2>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('umkm.seller.profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Foto Profil -->
        <div>
            <label class="block mb-2 font-semibold">Foto Profil</label>
            <div class="w-32 h-32 border rounded-full overflow-hidden mb-2">
                @if($profil->image_path)
                    <img src="{{ asset('storage/' . $profil->image_path) }}" alt="Foto Profil" class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('images/default-profile.png') }}" alt="Foto Profil Default" class="w-full h-full object-cover">
                @endif
            </div>
            <input type="file" name="image_path" accept="image/*" class="border rounded px-2 py-1 w-full">
            <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah foto.</p>
        </div>

        <!-- Nama -->
        <div>
            <label class="block mb-2 font-semibold">Nama</label>
            <input type="text" name="name" value="{{ old('name', $profil->name) }}" required class="border rounded px-3 py-2 w-full">
        </div>

        <!-- No HP -->
        <div>
            <label class="block mb-2 font-semibold">No HP</label>
            <input type="text" name="phone" value="{{ old('phone', $profil->phone) }}" class="border rounded px-3 py-2 w-full">
        </div>

        <!-- Alamat -->
        <div>
            <label class="block mb-2 font-semibold">Alamat</label>
            <textarea name="address" class="border rounded px-3 py-2 w-full" rows="3">{{ old('address', $profil->address) }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Simpan Perubahan
        </button>
        <a href="{{ route('umkm.seller.profil.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 ml-2">
            Kembali
        </a>
    </form>
</div>
@endsection
