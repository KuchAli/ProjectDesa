<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class KategoriController extends Controller
{
    public function index()
    {
        // Ambil semua kategori beserta jumlah produk
        $categories = Category::withCount('products')->orderBy('name')->paginate(10);

        return view('admin.kategori.index', compact('categories'));
    }
}
