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
        $keyword = request('search');
        $products = Product::with('seller')
        ->when($keyword, function ($query) use ($keyword) {
            $query->where('name', 'like', "%{$keyword}%")
                ->orWhere('price', 'like', "%{$keyword}%")
                ->orWhereHas('seller', function($sellerQuery) use ($keyword) {
                        $sellerQuery->where('name', 'like', "%{$keyword}%");
                });
        })
        ->latest()
        ->paginate(8);

// supaya pagination tetap membawa query search
$products->appends(['search' => $keyword]);

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
