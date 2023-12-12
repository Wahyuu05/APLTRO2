<?php

// File: app/Http/Middleware/CheckLogin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            // Dapatkan peran (role) pengguna yang sedang login
            $userRole = Auth::pengguna()->role; // Change from Auth::penggunas() to Auth::user()
            
            // Periksa apakah peran pengguna memiliki akses ke rute
            if (in_array($userRole, $roles)) {
                return $next($request); // Izinkan akses
            } else {
                return redirect('/unauthorized'); // Tolak akses
            }
        } else {
            return redirect('/login'); // Redirect to login if the user is not authenticated
        }
    }
}
