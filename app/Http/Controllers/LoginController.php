<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Susut;

class LoginController extends Controller
{

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Login::attempt($credentials)) {
        $request->session()->regenerate();

        if (Login::user()->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang Admin!');
        } else {
            return redirect()->route('susut.index')->with('success', 'Selamat datang!');
        }
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}

}