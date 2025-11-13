<?php

namespace App\Http\Controllers\UMKM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller

{
    public function index()
    {
      
        $userId = Auth::id();
        
        if (!$userId) {
            return redirect('/login-buyer')->with('error', 'Please login to access this page.');
        }

        return view('umkm.buyer.index', compact('userId'));
    }
    // 🔹 Show all products
    public function products()
    {
        $products = Product::latest()->paginate(10);
        return view('buyer.products', compact('products'));
    }

    // 🔹 Add product to cart
    public function addToCart($id)
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer')->with('error', 'Please login first!');
        }

        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image ?? null
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // 🔹 Show cart
    public function cart()
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer');
        }

        $cart = session('cart', []);
        return view('buyer.cart', compact('cart'));
    }

    // 🔹 Remove item from cart
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    // 🔹 Checkout (convert cart to order)
    public function checkout()
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer');
        }

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }

        foreach ($cart as $id => $item) {
            $product = Product::find($id);
            if ($product) {
                Order::create([
                    'buyer_id' => $buyer->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'total' => $product->price * $item['quantity'],
                    'status' => 'pending',
                ]);
            }
        }

        session()->forget('cart');
        return redirect()->route('buyer.orders')->with('success', 'Checkout successful!');
    }

    // 🔹 View orders
    public function orders()
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer');
        }

        $orders = Order::where('buyer_id', $buyer->id)->latest()->get();
        return view('buyer.orders', compact('orders', 'buyer'));
    }

    // 🔹 Buyer profile
    public function profile()
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer');
        }

        return view('buyer.profile', compact('buyer'));
    }

    // 🔹 Update profile
    public function updateProfile(Request $request)
    {
        $buyer = session('buyer');
        if (!$buyer) {
            return redirect('/login-buyer');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $buyer->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);

        session(['buyer' => $buyer]);
        return back()->with('success', 'Profile updated successfully!');
    }
}
