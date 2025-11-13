<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BuyerAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (Auth::check()) {
            
            // 2. Cek apakah peran pengguna adalah 'buyer'
            if (Auth::user()->role === 'buyer') {
                return $next($request);
            }
        }
        
        // Alihkan jika belum login atau role salah
        return redirect()->route('buyer.login')->with('error', 'Anda harus login sebagai Pembeli.');
    }
}
