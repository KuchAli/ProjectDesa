<?php

namespace App\Http\Controllers\UMKM\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfilBuyerController extends Controller
{
    public function index()
    {
        $profil = User::where('id', Auth::id())->first();
        return view('umkm.buyer.profil.index', compact('profil'));
    }

    public function edit()
    {
        $profil = User::where('id', Auth::id())->first();
        return view('umkm.buyer.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = User::where('id', Auth::id())->first();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug dari name
        $slug = Str::slug($request->name, '-');

        // Update image_path jika ada upload baru
        if ($request->hasFile('image_path')) {
            if ($profil->image_path && Storage::exists($profil->image_path)) {
                Storage::delete($profil->image_path);
            }

            $path = $request->file('image_path')->store('profil', 'public');
            $profil->image_path = $path;
        }

        // Update data profil
        $profil->name = $request->name;
        $profil->slug = $slug; // pastikan kolom 'slug' ada di tabel profil
        $profil->phone = $request->phone;
        $profil->address = $request->address;
        $profil->save();

        return redirect()->route('umkm.buyer.profil.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
