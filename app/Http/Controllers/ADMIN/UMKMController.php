<?php

namespace App\Http\Controllers\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class UMKMController extends Controller
{
    public function index()
    {
        // Ambil semua penjual
        $sellers = User::where('role', 'seller')->with('products')->paginate( 1);


        return view('admin.umkm.index', compact('sellers'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'Produk berhasil dihapus.');
    }
}