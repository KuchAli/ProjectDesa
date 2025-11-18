<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::whereIn('role', ['seller', 'buyer'])->count();
        $totalProduct = Product::count();
        $totalCategory = Category::count();

        // Pagination
        $products = Product::with('seller')->latest()->paginate(8);
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::withCount('products')->orderBy('name')->paginate(10);

        return view('admin.dashboard', compact(
            'totalUser',
            'totalProduct',
            'totalCategory',
            'products',
            'users',
            'categories'
        ));
    }

}
