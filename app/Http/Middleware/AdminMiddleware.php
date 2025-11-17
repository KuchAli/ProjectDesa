<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
   public function handle($request, Closure $next)
    {
        // jangan blok halaman login admin
        if ($request->routeIs('admin.login') || $request->routeIs('admin.login.process')) {
            return $next($request);
        }

        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.login')
                ->withErrors(['access' => 'Anda tidak memiliki akses sebagai admin.']);
        }

        return $next($request);
    }

}
