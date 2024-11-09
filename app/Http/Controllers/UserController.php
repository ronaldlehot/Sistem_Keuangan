<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function login(Request $request)
    {
        
        // Validasi input form
        $credentials = $request->only('username', 'password');
    
        // Cek kredensial
        if (User::attempt($credentials)) {
            // Regenerasi session untuk keamanan
            $request->session()->regenerate();
    
            // Set pesan sukses setelah login berhasil
            session()->flash('success_message', 'Login berhasil!');
    
            // Alihkan ke halaman beranda dengan pesan sukses
            return redirect()->route('beranda'); // Pastikan route ini sesuai dengan nama route halaman beranda Anda
        }
    
        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect('login')->with('error_message', 'Username dan Password Tidak Ditemukan');
    }
    

    public function logout(Request $request)
    {
        User::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('beranda');
    }

    public function beranda()
    {
        return view('beranda');
    }

}
