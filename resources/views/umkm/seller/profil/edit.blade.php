@extends('layout.seller') <!-- Sesuaikan layout dashboard seller -->

@section('title', 'Edit Profil')

@section('seller-content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Edit Profil Saya</h2>
    <hr>

    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

   <form action="{{ route('umkm.seller.profil.update', $profil->id) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-6">

    @csrf
    @method('PUT')

    

    <!-- FOTO PROFIL -->
    <div class="space-y-3 mt-4">
        <label class="block font-semibold text-gray-700">Foto Profil</label>

        <div class="flex items-center gap-4">
            <div class="w-28 h-28 rounded-full overflow-hidden border shadow-sm">
                @if($profil->image_path)
                    <img src="{{ asset('storage/' . $profil->image_path) }}" 
                         class=" object-cover" style="width: 300px; height: 300px;">
                @else
                    <img src="{{ asset('images/default-profile.png') }}" 
                         class="w-full h-full object-cover">
                @endif
            </div>

            <div class="flex-1">
                <input type="file" 
                       name="image_path" 
                       accept="image/*"
                       class="form-control">
                <p class=" text-muted mt-1">
                    Biarkan kosong jika tidak ingin mengubah foto.
                </p>
            </div>
        </div>
    </div>

    <!-- NAMA -->
    <div class="mt-4">
        <label class="block mb-1 font-semibold text-gray-700">Nama</label>
        <input type="text" 
               name="name" 
               value="{{ old('name', $profil->name) }}" 
               required
               class="form-control">
    </div>

    <!-- NO HP -->
    <div class="mt-4">
        <label class=" mb-1 font-semibold text-gray-700">No HP</label>
        <input type="text" 
               name="phone" 
               value="{{ old('phone', $profil->phone) }}" 
               class="form-control">
    </div>

    <!-- ALAMAT -->
    <div class=" mt-4">
    <label class="block font-semibold text-gray-700 mb-2">Alamat</label>
        <input type="text" 
               name="address" 
               value="{{ old('address', $profil->address) }}" 
               class="form-control">
    </div>

    <!-- BUTTON -->
    <div class="flex justify-end gap-3 mt-2 mt-5">
        <a href="{{ route('umkm.seller.profil.index') }}" 
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition btn btn-secondary">
            Kembali
        </a>

        <button type="submit" 
                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition btn btn-success">
            Simpan Perubahan
        </button>
    </div>

</form>

</div>
@endsection
