<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        if($request->password!=$request->password2){
            return redirect('/register')->with('loginError', 'Registrasi Gagal! Kolom Password dan Konfirmasi Password harus sesuai!');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'nomor' => 'required|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validatedData['role'] = 'siswa';
        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successfully! Please login!');

        return redirect('/login')->with('success', 'Registrasi Berhasil! Silahkan Login!');
    }
}
