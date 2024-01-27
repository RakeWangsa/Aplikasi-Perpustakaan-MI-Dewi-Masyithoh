<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class DaftarKelasController extends Controller
{
    public function index()
    {
        $email=session('email');
        $name = DB::table('users')
        ->where('email',$email)
        ->pluck('name')
        ->first();
        $kelas = DB::table('kelas')
        ->where('guru',$name)
        ->select('*')
        ->orderByRaw("CASE hari
            WHEN 'senin' THEN 1
            WHEN 'selasa' THEN 2
            WHEN 'rabu' THEN 3
            WHEN 'kamis' THEN 4
            WHEN 'jumat' THEN 5
            WHEN 'sabtu' THEN 6
            ELSE 7 END")
        ->orderBy('waktu')
        ->get();
        $semuaKelas = DB::table('kelas')
        ->select('*')
        ->orderByRaw("CASE hari
            WHEN 'senin' THEN 1
            WHEN 'selasa' THEN 2
            WHEN 'rabu' THEN 3
            WHEN 'kamis' THEN 4
            WHEN 'jumat' THEN 5
            WHEN 'sabtu' THEN 6
            ELSE 7 END")
        ->orderBy('waktu')
        ->get();
        return view('guru.daftarKelas', [
            'title' => 'Daftar Kelas',
            'active' => 'daftar kelas',
            'kelas' => $kelas,
            'semuaKelas' => $semuaKelas
        ]);
    }

    public function daftarSiswa($id)
    {
        $id = base64_decode($id);
        $siswa = DB::table('kelasSiswa')
            ->where('kelas', 'like', '%' . $id . '%')
            ->select('*')
            ->get();

        $siswa = $siswa->map(function ($item) {
            $user = DB::table('users')
                ->where('id', $item->id_siswa)
                ->select('nomor')
                ->first();
        
            $item->nomor = $user->nomor;
            return $item;
        });
        $siswa = $siswa->sortBy('nomor');

        $waktuAbsen = DB::table('waktuAbsen')
            ->where('id_kelas', $id)
            ->select('*')
            ->get();
        $info = DB::table('kelas')
            ->where('id', $id)
            ->select('*')
            ->first();

        // $skrg = Carbon::now()->addHours(7);
        // $tahun = $skrg->year;
        // $bulan = $skrg->month;
        // $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        // $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        // if($bulan>6){
        //     $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        // }else{
        //     $tahunAjaran=$tahunSebelumnya."/".$tahun;
        // }

        return view('guru.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
            'id' => $id,
            'waktuAbsen' => $waktuAbsen,
            'info' => $info,
            // 'tahunAjaran' => $tahunAjaran
        ]);
    }

    public function daftarSiswaFilter($id,$filter)
    {
        $id = base64_decode($id);
        $siswa = DB::table('kelasSiswa')
            ->where('kelas', 'like', '%' . $id . '%')
            ->select('*')
            ->get();
        $siswa = $siswa->map(function ($item) {
            $user = DB::table('users')
                ->where('id', $item->id_siswa)
                ->select('nomor')
                ->first();
        
            $item->nomor = $user->nomor;
            return $item;
        });
        $siswa = $siswa->sortBy('nomor');

        $waktuAbsen = DB::table('waktuAbsen')
            ->where('id_kelas', $id)
            ->where(DB::raw('MONTH(waktu)'), $filter)
            ->select('*')
            ->get();
        $info = DB::table('kelas')
            ->where('id', $id)
            ->select('*')
            ->first();

        // $skrg = Carbon::now()->addHours(7);
        // $tahun = $skrg->year;
        // $bulan = $skrg->month;
        // $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        // $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        // if($bulan>6){
        //     $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        // }else{
        //     $tahunAjaran=$tahunSebelumnya."/".$tahun;
        // }

        return view('guru.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
            'id' => $id,
            'waktuAbsen' => $waktuAbsen,
            'info' => $info,
            // 'tahunAjaran' => $tahunAjaran,
            'filter' => $filter,
        ]);
    }

    public function daftarSiswaSearch(Request $request, $id)
    {
        $id = base64_decode($id);
        $search = $request->nama;
        $siswa = DB::table('kelasSiswa')
            ->where('kelas', 'like', '%' . $id . '%')
            ->where('nama', $request->nama)
            ->select('*')
            ->get();
        $siswa = $siswa->map(function ($item) {
            $user = DB::table('users')
                ->where('id', $item->id_siswa)
                ->select('nomor')
                ->first();
        
            $item->nomor = $user->nomor;
            return $item;
        });
        $siswa = $siswa->sortBy('nomor');
        
        $waktuAbsen = DB::table('waktuAbsen')
            ->where('id_kelas', $id)
            ->select('*')
            ->get();
        $info = DB::table('kelas')
            ->where('id', $id)
            ->select('*')
            ->first();

        // $skrg = Carbon::now()->addHours(7);
        // $tahun = $skrg->year;
        // $bulan = $skrg->month;
        // $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        // $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        // if($bulan>6){
        //     $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        // }else{
        //     $tahunAjaran=$tahunSebelumnya."/".$tahun;
        // }

        return view('guru.daftarSiswa', [
            'title' => 'Daftar Siswa',
            'active' => 'daftar siswa',
            'siswa' => $siswa,
            'id' => $id,
            'waktuAbsen' => $waktuAbsen,
            'info' => $info,
            // 'tahunAjaran' => $tahunAjaran,
            'search' => $search,
        ]);
    }

    public function tambahKelas()
    {
        $email=session('email');
        $name = DB::table('users')
        ->where('email',$email)
        ->pluck('name')
        ->first();
        $skrg = Carbon::now()->addHours(7);
        $tahun = $skrg->year;
        $bulan = $skrg->month;
        $tahunSelanjutnya = Carbon::now()->addHours(7)->addYears(1)->year;
        $tahunSebelumnya = Carbon::now()->addHours(7)->subYears(1)->year;
        if($bulan>6){
            $tahunAjaran=$tahun."/".$tahunSelanjutnya;
        }else{
            $tahunAjaran=$tahunSebelumnya."/".$tahun;
        }
        return view('guru.tambahKelas', [
            'title' => 'Tambah Kelas',
            'active' => 'tambah kelas',
            'name' => $name,
            'tahunAjaran' => $tahunAjaran
        ]);
    }

    public function tambahKelasSubmit(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi ',
            'hari.required' => 'Pilih Hari!',
            'hari.not_in' => 'Pilih Hari!',
            'ruang.required' => 'Pilih Kelas!',
            'ruang.not_in' => 'Pilih Kelas!',
            'pelajaran.required' => 'Pilih Pelajaran!',
            'pelajaran.not_in' => 'Pilih Pelajaran!',
            'waktu.required' => 'Pilih Waktu!',
        ];

        $this->validate($request, [
            "ruang" => ['required', Rule::notIn(['Pilih Kelas!'])],
            "pelajaran" => ['required', Rule::notIn(['Pilih Pelajaran!'])],
            'hari' => ['required', Rule::notIn(['Pilih Hari!'])],
            "waktu" => ['required'],
        ], $messages);

        Kelas::insert([
                'guru' => $request->guru,
                'pelajaran' => $request->pelajaran,
                'ruang' => $request->ruang,
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'tahun_ajaran' => $request->tahun_ajaran
            ]);

        return redirect('/daftarKelas')->with('success');
    }

    public function editKelas($id)
    {
        $id = base64_decode($id);
        $kelas = DB::table('kelas')
        ->where('id',$id)
        ->select('id', 'ruang', 'pelajaran', 'guru', 'hari', 'waktu', 'tahun_ajaran')
        ->get();
        return view('guru.editKelas', [
            "title" => "Edit User",
            'active' => 'edit user',
            'kelas' => $kelas,
            'id' => $id
        ]);
    }

    public function updateKelas(Request $request, $id)
    {
        $id = base64_decode($id);
        $messages = [
            'required' => ':attribute wajib diisi ',
            'hari.required' => 'Pilih Hari!',
            'hari.not_in' => 'Pilih Hari!',
            'ruang.required' => 'Ruang harus diisi!',
            'pelajaran.required' => 'Pelajaran harus diisi!',
            'waktu.required' => 'Pilih Waktu!',
        ];

        $this->validate($request, [
            "ruang" => ['required'],
            "pelajaran" => ['required'],
            'hari' => ['required', Rule::notIn(['Pilih Hari!'])],
            "waktu" => ['required'],
        ], $messages);

        Kelas::where('id', $id)->update([
            'guru' => $request->guru,
            'pelajaran' => $request->pelajaran,
            'ruang' => $request->ruang,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
        ]);        

        return redirect('/daftarKelas')->with('success');
    }

    public function hapusKelas($id)
    {
        $id = base64_decode($id);
        Kelas::where('id', $id)->delete();
        Absensi::where('id_kelas', $id)->delete();

        return redirect('/daftarKelas')->with('success');
    }
}
