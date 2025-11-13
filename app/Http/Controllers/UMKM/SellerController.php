<?php

namespace App\Http\Controllers\UMKM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class SellerController extends Controller
{
    public function index()
    {
        $sellerId = Auth::id();
        $produk = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name', 'categories.slug as category_slug')
            ->where('products.seller_id', $sellerId)
            ->latest('products.created_at')
            ->paginate(10);

        return view('umkm.seller.index', compact('produk'));
    }

    public function create()
    {
        // Ambil semua kategori agar bisa dipilih seller
        $categories = Category::all();
        return view('umkm.seller.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
        }

        $category = Category::find($request->category_id);
        $categorySlug = $category ? $category->slug : null;

        DB::table('products')->insert([
            'seller_id' => Auth::id(),
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
            'category_slug' => $categorySlug,
            'image' => $path,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('umkm.seller.index')->with('success', 'Produk berhasil ditambahkan!');

    }

    public function edit(string $id)
    {
        $produk = DB::table('products')
            ->where('id', $id)
            ->where('seller_id', Auth::id())
            ->first();

        if (! $produk) {
            abort(404);
        }

        $categories = DB::table('categories')->select('id', 'name')->get();

        return view('umkm.seller.edit', compact('produk', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $produk = DB::table('products')
            ->where('id', $id)
            ->where('seller_id', Auth::id())
            ->first();

        if (! $produk) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:150',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $produk->image_path ?? null;
        if ($request->hasFile('image')) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('image')->store('products', 'public');
        }

        DB::table('products')
            ->where('id', $id)
            ->where('seller_id', Auth::id())
            ->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'image' => $path,
                'updated_at' => now(),
            ]);

       return redirect()->route('umkm.seller.index')->with('success', 'Produk berhasil diperbarui!');
   }

    public function destroy(string $id)
    {
        $produk = DB::table('products')
            ->where('id', $id)
            ->where('seller_id', Auth::id())
            ->first();

        if (! $produk) {
            abort(404);
        }

        if ($produk->image) {
            Storage::disk('public')->delete($produk->image);
        }

        DB::table('products')
            ->where('id', $id)
            ->where('seller_id', Auth::id())
            ->delete();

      return redirect()->route('umkm.seller.index')->with('success', 'Produk berhasil dihapus!');
   }
}
