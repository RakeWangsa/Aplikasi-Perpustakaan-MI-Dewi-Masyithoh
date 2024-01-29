<?php

namespace App\Http\Controllers;

use App\Models\DaftarBuku;
use App\Models\DaftarSiswa;
use App\Models\NomorBuku;
use App\Models\Peminjaman;
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
        $peminjaman = DB::table('peminjaman')
        ->select('*')
        ->orderBy('nomor_buku')
        ->get();
        $nomorBuku = DB::table('nomor_buku')
        ->select('*')
        ->get();
        $buku = DB::table('daftar_buku')
        ->select('*')
        ->get();

        return view('daftar.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
            'peminjaman' => $peminjaman,
            'nomorBuku' => $nomorBuku,
            'buku' => $buku

        ]);
    }

    public function daftarSiswaSearch(Request $request)
    {
        $search=$request->search;
        $siswa = DB::table('daftar_siswa')
        ->where(function ($query) use ($request) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nisn', 'like', '%' . $request->search . '%');
        })
        ->select('*')
        ->orderBy('nisn')
        ->get();
        $peminjaman = DB::table('peminjaman')
        ->select('*')
        ->orderBy('nomor_buku')
        ->get();
        $nomorBuku = DB::table('nomor_buku')
        ->select('*')
        ->get();
        $buku = DB::table('daftar_buku')
        ->select('*')
        ->get();

        return view('daftar.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
            'peminjaman' => $peminjaman,
            'nomorBuku' => $nomorBuku,
            'buku' => $buku,
            'search' => $search
        ]);
    }

    public function daftarBuku()
    {
        $buku = DB::table('daftar_buku')
        ->select('*')
        ->orderBy('nama')
        ->get();
        $nomorBuku = DB::table('nomor_buku')
        ->select('*')
        ->orderBy('nomor_buku')
        ->get();
        $peminjaman = DB::table('peminjaman')
        ->select('*')
        ->orderBy('nomor_buku')
        ->get();
        $siswa = DB::table('daftar_siswa')
        ->select('*')
        ->orderBy('nisn')
        ->get();

        return view('daftar.daftarBuku', [
            'title' => 'Daftar Buku',
            'active' => 'daftar buku',
            'buku' => $buku,
            'nomorBuku' => $nomorBuku,
            'peminjaman' => $peminjaman,
            'siswa' => $siswa,
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

    public function hapusSiswa($id)
    {
        $id = base64_decode($id);
        DaftarSiswa::where('id', $id)->delete();
        return redirect('/daftarSiswa')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function editSiswa(Request $request, $id)
    {
        $id = base64_decode($id);
        $siswa = DaftarSiswa::findOrFail($id);

        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;

        $siswa->save();
        return redirect('/daftarSiswa')->with('success', 'Data siswa berhasil diupdate!');
        
    }

    public function hapusBuku($id)
    {
        $id = base64_decode($id);
        DaftarBuku::where('id', $id)->delete();
        return redirect('/daftarBuku')->with('success', 'Data buku berhasil dihapus!');
    }

    public function editBuku(Request $request, $id)
    {
        $id = base64_decode($id);
        $buku = DaftarBuku::findOrFail($id);

        $buku->nama = $request->nama;

        $buku->save();
        return redirect('/daftarBuku')->with('success', 'Data buku berhasil diupdate!');
        
    }

    public function tambahJumlahBuku(Request $request)
    {
        NomorBuku::create([
            'id_buku' => $request->id_buku,
            'nomor_buku' => $request->nomor_buku,
        ]);

        // Redirect ke route daftarBuku
        return redirect()->route('daftarBuku');
    }

    public function tambahPinjaman(Request $request)
    {
        Peminjaman::create([
            'nisn' => $request->nisn,
            'nomor_buku' => $request->nomor_buku,
        ]);

        // Redirect ke route daftarBuku
        return redirect()->route('daftarSiswa');
    }
    public function pengembalian(Request $request)
    {
        Peminjaman::where('nomor_buku', $request->nomor_buku)->delete();
        return redirect('/daftarSiswa')->with('success', 'Buku berhasil dikembalikan!');
    }
}
