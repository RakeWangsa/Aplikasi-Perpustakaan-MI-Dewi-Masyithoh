<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function daftarSiswa()
    {
        $guru = DB::table('daftar_siswa')
        ->select('*')
        ->orderBy('nisn')
        ->get();

        return view('daftar.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'guru' => $guru,
        ]);
    }
}
