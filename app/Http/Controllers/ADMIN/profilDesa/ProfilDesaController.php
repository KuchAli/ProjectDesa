<?php

namespace App\Http\Controllers\ADMIN\profilDesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Visimisi;
use App\Models\Bagan;
use App\Models\Sejarah;

class ProfilDesaController extends Controller
{
    // ===================== VISI MISI =====================
    public function visiMisiIndex()
    {

        $visiMisis = Visimisi::get();
        return view('admin.profilDesa.visiMisi.index', compact('visiMisis'));
    }


    public function visiMisiCreate()
    {
        return view('admin.profilDesa.visiMisi.create');
    }

    public function visiMisiStore(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        Visimisi::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('admin.profilDesa.visiMisi.index')
                         ->with('success', 'Visi Misi berhasil ditambahkan!');
    }

    public function visiMisiEdit($id)
    {
        $visiMisis = Visimisi::findOrFail($id);
        return view('admin.profilDesa.visiMisi.edit', compact('visiMisis'));
    }

    public function visiMisiUpdate(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visiMisis = Visimisi::findOrFail($id);
        $visiMisis->update([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        return redirect()->route('admin.profilDesa.visiMisi.index')
                         ->with('success', 'Visi Misi berhasil diperbarui!');
    }

    public function visiMisiDestroy($id)
    {
        $visiMisis= Visimisi::findOrFail($id);
        $visiMisis->delete();

        return redirect()->route('admin.profilDesa.visiMisi.index')
                         ->with('success', 'Visi Misi berhasil dihapus!');
    }

    // ===================== BAGAN =====================
    public function baganIndex()
    {
        $bagans = Bagan::paginate(10);
        return view('admin.profilDesa.bagan.index', compact('bagans'));
    }

    public function baganCreate()
    {
        return view('admin.profilDesa.bagan.create');
    }

    public function baganStore(Request $request)
    {
        $request->validate([
            'bagan_slug' => 'required|string|unique:profil_desa,bagan_slug',
            'image_bagan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_bagan')) {
            $imagePath = $request->file('image_bagan')->store('bagan', 'public');
        }

        Bagan::create([
            'bagan_slug' => Str::slug($request->bagan_slug),
            'image_bagan' => $imagePath,
        ]);

        return redirect()->route('admin.profilDesa.bagan.index')
                         ->with('success', 'Bagan berhasil ditambahkan!');
    }

    public function baganDestroy($id)
    {
        $bagan = Bagan::findOrFail($id);
        $bagan->delete();

        return redirect()->route('admin.profilDesa.bagan.index')
                         ->with('success', 'Bagan berhasil dihapus!');
    }

    // ===================== SEJARAH =====================
    public function sejarahIndex()
    {
        $sejarahs = Sejarah::paginate(10);
        return view('admin.profilDesa.sejarah.index', compact('sejarahs'));
    }

    public function sejarahCreate()
    {
        return view('admin.profilDesa.sejarah.create');
    }

    public function sejarahStore(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
            
        ]);

        Sejarah::create([
            'sejarah' => $request->sejarah,
            
        ]);

        return redirect()->route('admin.profilDesa.sejarah.index')
                         ->with('success', 'Sejarah berhasil ditambahkan!');
    }

    public function sejarahEdit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('admin.profilDesa.sejarah.edit', compact('sejarah'));
    }

    public function sejarahUpdate(Request $request, $id)
    {
        $request->validate([
            'sejarah' => 'required|string',
            
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->update([
            'sejarah' => $request->sejarah,
            
        ]);

        return redirect()->route('admin.profilDesa.sejarah.index')
                         ->with('success', 'Sejarah berhasil diperbarui!');
    }
    public function sejarahDestroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();

        return redirect()->route('admin.profilDesa.sejarah.index')
                         ->with('success', 'Sejarah berhasil dihapus!');
    }
    
}
