<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Tambahan pengecekan status user aktif
        $user = Auth::user();
        if (property_exists($user, 'ACTIVE') && $user->ACTIVE != 1) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'account' => 'Akun Anda tidak aktif'
            ]);
        }

        return $next($request);
    }
}