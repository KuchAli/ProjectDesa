<?php

namespace App\Http\Controllers\ADMIN;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KepalaDesa;
use Illuminate\Support\Facades\Storage;

class KepalaDesaController extends Controller
{
     public function index()
    {
        $data = KepalaDesa::first();
        return view('admin.kepala-desa.index', compact('data'));
    }

    public function create()
    {
        return view('admin.kepala-desa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sambutan' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('kepala-desa', 'public');
        }

        KepalaDesa::create($validated);

        return redirect()->route('admin.kepala-desa.index')
            ->with('success', 'Data Kepala Desa berhasil disimpan');
    }

    public function edit(KepalaDesa $kepalaDesa)
    {
        return view('admin.kepala-desa.edit', compact('kepalaDesa'));
    }

    public function update(Request $request, KepalaDesa $kepalaDesa)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sambutan' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($kepalaDesa->image) {
                Storage::disk('public')->delete($kepalaDesa->image);
            }
            $validated['image'] = $request->file('image')->store('kepala-desa', 'public');
        }

        $kepalaDesa->update($validated);

        return redirect()->route('admin.kepala-desa.index')
            ->with('success', 'Data Kepala Desa berhasil diperbarui');
    }
}
