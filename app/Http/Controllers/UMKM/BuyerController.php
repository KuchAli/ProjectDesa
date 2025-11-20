<?php

namespace App\Http\Controllers\UMKM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function index()
    {
        $buyer = Auth::user();

        if (!$buyer || $buyer->role !== 'buyer') {
            return redirect('/login-buyer')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil produk + data penjual
        $products = Product::with('seller')->latest()->paginate(8);

        return view('umkm.buyer.index', compact('products'));
    }

    // jika masih mau halaman lain (opsional)
    public function products()
    {
        $products = Product::latest()->paginate(10);
        return view('umkm.buyer.products', compact('products'));
    }

    
    public function show($id)
    {
        $products = Product::with(['seller'])->findOrFail($id);

        return view('umkm.buyer.detail', compact('products'));
    }
}
