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
       $totalUser = User::where('role', 'seller')->count()
               + User::where('role', 'buyer')->count();

        $totalProduct = Product::count();
        $totalCategory = Category::count();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalProduct',
            'totalCategory'
        ));
    }
}
