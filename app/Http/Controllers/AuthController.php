<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('filament.auth.login');
    }

    public function login(Request $request)
    {
        
        // Validasi input form
        $credentials = $request->only('username', 'password');
    
        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
    
            // Set pesan sukses setelah login berhasil
            session()->flash('success_message', 'Login berhasil!');
    
            // Alihkan ke halaman beranda dengan pesan sukses
            return redirect()->route(' filament.admin.pages.dashboard '); // Pastikan route ini sesuai dengan nama route halaman beranda Anda
        }
    
        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect('login')->with('error_message', 'Username dan Password Tidak Ditemukan');
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('filament.auth.login');
    }

   
}
