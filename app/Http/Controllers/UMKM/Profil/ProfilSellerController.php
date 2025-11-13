<?php

namespace App\Http\Controllers\UMKM\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; // untuk membuat slug
use Illuminate\Support\Facades\Storage;

class ProfilSellerController extends Controller
{
    public function index()
    {
        $profil = Auth::user()->profil;
        return view('umkm.seller.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = Auth::user()->profil;
        return view('umkm.seller.profil.edit', compact('profil'));
    }

    public function update(Request $request, String $id)
    {
        $profil = Auth::user()->profil;

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
        ]);

        // Update slug dari name
        $slug = Str::slug($request->name, '-');

        // Update image_path jika ada upload baru
        if ($request->hasFile('image_path')) {
            // Hapus image_path lama jika ada
            if ($profil->image_path && Storage::exists($profil->image_path)) {
                Storage::delete($profil->image_path);
            }

            // Simpan image_path baru
            $path = $request->file('image_path')->store('profil', 'public'); // simpan di storage/app/public/profil
            $profil->image_path = $path;
        }

        // Update profil
        $profil->name = $request->name;
        $profil->slug = $slug; // pastikan kolom 'slug' ada di tabel profil
        $profil->phone = $request->phone;
        $profil->address = $request->address;
        $profil->save();

        return redirect()->route('umkm.seller.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
