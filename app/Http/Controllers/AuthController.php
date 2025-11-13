<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ======== LOGIN & REGISTER PEMBELI ======== //
    public function loginBuyerForm() { return view('auth.login_buyer'); }

    public function loginBuyer(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

       if (Auth::attempt(array_merge($credentials, ['role' => 'buyer']))) {
            $request->session()->regenerate();
            return redirect()->route('umkm.buyer.index');
        }


        return back()->withErrors(['email' => 'Email atau password salah atau bukan akun pembeli.']);
    }

    public function registerBuyerForm() { return view('auth.register_buyer'); }

    public function registerBuyer(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
           
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'buyer'
        

        ]);

        Auth::login($user);
        return redirect()->route('umkm.buyer.index');
    }

    // ======== LOGIN & REGISTER PENJUAL ======== //
    public function loginSellerForm() { return view('auth.login_seller'); }

    public function loginSeller(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(array_merge($credentials, ['role' => 'seller']))) {
            return redirect()->route('umkm.seller.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah atau bukan akun penjual.']);
    }

    public function registerSellerForm() { return view('auth.register_seller'); }

    public function registerSeller(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'seller'
            

        ]);

        Auth::login($user);
        return redirect()->route('umkm.seller.index');
    }

    // ======== LOGOUT ======== //
    public function logout()
    {
        Auth::logout();
        return redirect()->route('umkm.index');
    }
}

