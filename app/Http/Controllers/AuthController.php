<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pegawai;

class AuthController extends Controller
{
    public function loginPegawai(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);


        if (Auth::guard('pegawai')->attempt(['nama' => $request->nama, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        return redirect('/')->with('error', "Nama atau Password Salah!");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $jml = Pegawai::get()->count();
        return view('Pegawai', ['jml' => $jml]);
    }
}
