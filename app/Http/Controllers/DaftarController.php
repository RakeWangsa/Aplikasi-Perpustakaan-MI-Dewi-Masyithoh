<?php

namespace App\Http\Controllers;

use App\Models\DaftarBuku;
use App\Models\DaftarSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarController extends Controller
{
    public function daftarSiswa()
    {
        $siswa = DB::table('daftar_siswa')
        ->select('*')
        ->orderBy('nisn')
        ->get();

        return view('daftar.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
        ]);
    }

    public function daftarBuku()
    {
        $buku = DB::table('daftar_buku')
        ->select('*')
        ->orderBy('nama')
        ->get();

        return view('daftar.daftarBuku', [
            'title' => 'Daftar Buku',
            'active' => 'daftar buku',
            'buku' => $buku,
        ]);
    }

    public function tambahBuku(Request $request)
    {
        DaftarBuku::create([
            'nama' => $request->nama_buku,
        ]);

        // Redirect ke route daftarBuku
        return redirect()->route('daftarBuku');
    }

    public function tambahSiswa(Request $request)
    {
        DaftarSiswa::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        // Redirect ke route daftarBuku
        return redirect()->route('daftarSiswa');
    }
}
