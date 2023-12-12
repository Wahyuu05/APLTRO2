<?php
// File: app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class LoginController extends Controller
{
    protected $username = 'username';

    public function login(Request $request)
    {
        // Validasi data dari form login
        $credentials = $request->validate([
            $this->username => 'required|exists:penggunas,username',
            'password' => 'required'
        ]);

        // Authentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Jika berhasil login, arahkan ke halaman sesuai peran
            return $this->redirectBasedOnRole(Auth::user()->role);
        } else {
            // Jika gagal login, redirect ke halaman login dengan pesan error
            return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function redirectBasedOnRole($role)
    {
        // Redirect sesuai peran (role) pengguna
        switch ($role) {
            case 'Admin':
                return redirect('/home');
                break;
            case 'Dosen':
                return redirect('/home');
                break;
            case 'Mahasiswa':
                return redirect('/home');
                break;
            default:
                return redirect('/login');
                break;
        }
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function logout()
    {
        // Logout pengguna
        Auth::logout();
        // Redirect ke halaman login setelah logout
        return redirect('/login');
    }
}
