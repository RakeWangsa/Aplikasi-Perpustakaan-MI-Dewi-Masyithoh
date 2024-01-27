<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\waktuAbsen;

class AbsensiController extends Controller
{
    public function generateQR($id)
    {
        $id_kelas = base64_decode($id);
        $rand = mt_rand(100000, 999999);
        $skrg = Carbon::now()->addHours(7);
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $cek = DB::table('kelas')
        ->where('id',$id_kelas)
        ->pluck('waktu_absen')
        ->first();
        if($cek<$hariIni){
            $siswa = DB::table('kelasSiswa')
            ->where('kelas', 'like', '%' . $id_kelas . '%')
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

            foreach ($siswa as $data) {
                $id_siswa = $data->id_siswa;
                $nama = $data->nama;

                Absensi::insert([
                    'id_siswa' => $id_siswa,
                    'nama' => $nama,
                    'id_kelas' => $id_kelas,
                    'waktu' => $skrg,
                    'status' => 'Alfa'
                ]);
            }
            waktuAbsen::insert([
                'id_kelas' => $id_kelas,
                'waktu' => $hariIni,
            ]);
        }
        Kelas::where('id', $id_kelas)
            ->update([
                'code_absen' => $rand,
                'waktu_absen' => $skrg
        ]);

        return redirect('/home/absensi/'.$id)->with('rand', $rand);
        
    }

    public function submitAbsen(Request $request, $id_kelas)
    {
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $idkelas = base64_decode($id_kelas);
        $skrg = Carbon::now()->addHours(7);
        $skrgmin15 = Carbon::now()->addHours(7)->subMinutes(15);
        $email=session('email');
        $name = DB::table('users')
        ->where('email',$email)
        ->pluck('name')
        ->first();
        $id_siswa = DB::table('users')
        ->where('email',$email)
        ->pluck('id')
        ->first();

        $code_absen=DB::table('kelas')
        ->where('id',$idkelas)
        ->where('waktu_absen', '>', $skrgmin15)
        ->pluck('code_absen')
        ->first();

        if($request->scan==$code_absen){
            Absensi::where('id_kelas', $idkelas)
            ->where('id_siswa', $id_siswa)
            ->where('waktu', '>',$hariIni)
            ->update([
                'waktu' => $skrg,
                'status' => 'Hadir'
            ]);
            return redirect('/home')->with('success', 'Berhasil melakukan absensi');
        }else{
            return redirect('/scan/'.$id_kelas)->with('success', 'Absensi gagal, silahkan coba lagi!');
        }
    }

    public function riwayatAbsen()
    {
        $email=session('email');
        $id_siswa = DB::table('users')
        ->where('email',$email)
        ->pluck('id')
        ->first();
        $absensi = DB::table('absensi')
        ->where('id_siswa',$id_siswa)
        ->select('*')
        ->get();
        $kelas = DB::table('kelas')
        ->select('*')
        ->get();
        return view('siswa.riwayatAbsen', [
            'title' => 'Riwayat Absen',
            'active' => 'riwayat absen',
            'absensi' => $absensi,
            'kelas' => $kelas,
        ]);
    }

    public function setHadir($id_kelas,$id_siswa)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $skrg = Carbon::now()->addHours(7);
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $name = DB::table('users')
        ->where('id',$id_siswa)
        ->pluck('name')
        ->first();
        $cek = DB::table('absensi')
        ->where('id_siswa',$id_siswa)
        ->where('waktu', '>', $hariIni)
        ->pluck('status')
        ->first();

        if(isset($cek)){
            $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
                ->where('id_kelas', $idkelas)
                ->orderBy('id', 'desc')
                ->first();
                if($rowToUpdate){
                    $rowToUpdate->update([
                        'status' => 'Hadir',
                        'waktu' => $skrg,
                    ]);
                }
        }else{
            Absensi::insert([
                'id_siswa' => $id_siswa,
                'nama' => $name,
                'id_kelas' => $idkelas,
                'status' => 'Hadir',
                'waktu' => $skrg,
            ]);
        }

                

        return redirect('/home/absensi/'.$id_kelas)->with('success');
    }

    public function setSakit($id_kelas,$id_siswa)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $skrg = Carbon::now()->addHours(7);
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $name = DB::table('users')
        ->where('id',$id_siswa)
        ->pluck('name')
        ->first();
        $cek = DB::table('absensi')
        ->where('id_siswa',$id_siswa)
        ->where('waktu', '>', $hariIni)
        ->pluck('status')
        ->first();

        if(isset($cek)){
            $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
                ->where('id_kelas', $idkelas)
                ->orderBy('id', 'desc')
                ->first();
                if($rowToUpdate){
                    $rowToUpdate->update([
                        'status' => 'Sakit',
                        'waktu' => $skrg,
                    ]);
                }
        }else{
            Absensi::insert([
                'id_siswa' => $id_siswa,
                'nama' => $name,
                'id_kelas' => $idkelas,
                'status' => 'Sakit',
                'waktu' => $skrg,
            ]);
        }
        return redirect('/home/absensi/'.$id_kelas)->with('success');
    }

    public function setIzin($id_kelas,$id_siswa)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $skrg = Carbon::now()->addHours(7);
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $name = DB::table('users')
        ->where('id',$id_siswa)
        ->pluck('name')
        ->first();
        $cek = DB::table('absensi')
        ->where('id_siswa',$id_siswa)
        ->where('waktu', '>', $hariIni)
        ->pluck('status')
        ->first();

        if(isset($cek)){
            $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
                ->where('id_kelas', $idkelas)
                ->orderBy('id', 'desc')
                ->first();
                if($rowToUpdate){
                    $rowToUpdate->update([
                        'status' => 'Izin',
                        'waktu' => $skrg,
                    ]);
                }
        }else{
            Absensi::insert([
                'id_siswa' => $id_siswa,
                'nama' => $name,
                'id_kelas' => $idkelas,
                'status' => 'Izin',
                'waktu' => $skrg,
            ]);
        }
        return redirect('/home/absensi/'.$id_kelas)->with('success');
    }

    public function setTidakHadir($id_kelas,$id_siswa)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $skrg = Carbon::now()->addHours(7);
        $hariIni = Carbon::now()->addHours(7)->startOfDay();
        $name = DB::table('users')
        ->where('id',$id_siswa)
        ->pluck('name')
        ->first();
        $cek = DB::table('absensi')
        ->where('id_siswa',$id_siswa)
        ->where('waktu', '>', $hariIni)
        ->pluck('status')
        ->first();

        if(isset($cek)){
            $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
                ->where('id_kelas', $idkelas)
                ->orderBy('id', 'desc')
                ->first();
                if($rowToUpdate){
                    $rowToUpdate->update([
                        'status' => 'Alfa',
                        'waktu' => $skrg,
                    ]);
                }
        }else{
            Absensi::insert([
                'id_siswa' => $id_siswa,
                'nama' => $name,
                'id_kelas' => $idkelas,
                'status' => 'Alfa',
                'waktu' => $skrg,
            ]);
        }
        return redirect('/home/absensi/'.$id_kelas)->with('success');
    }

    public function editHadir($id_kelas,$id_siswa,$waktu)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $waktu = base64_decode($waktu);
        $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
        ->where('id_kelas', $idkelas)
        ->where('waktu', $waktu)
        ->first();
        if($rowToUpdate){
            $rowToUpdate->update([
                'status' => 'Hadir',
            ]);
        }    
        return redirect('/daftarSiswa/'.$id_kelas)->with('success');
    }

    public function editSakit($id_kelas,$id_siswa,$waktu)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $waktu = base64_decode($waktu);
        $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
        ->where('id_kelas', $idkelas)
        ->where('waktu', $waktu)
        ->first();
        if($rowToUpdate){
            $rowToUpdate->update([
                'status' => 'Sakit',
            ]);
        }    
        return redirect('/daftarSiswa/'.$id_kelas)->with('success');
    }

    public function editIzin($id_kelas,$id_siswa,$waktu)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $waktu = base64_decode($waktu);
        $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
        ->where('id_kelas', $idkelas)
        ->where('waktu', $waktu)
        ->first();
        if($rowToUpdate){
            $rowToUpdate->update([
                'status' => 'Izin',
            ]);
        }    
        return redirect('/daftarSiswa/'.$id_kelas)->with('success');
    }

    public function editAlfa($id_kelas,$id_siswa,$waktu)
    {
        $id_siswa = base64_decode($id_siswa);
        $idkelas = base64_decode($id_kelas);
        $waktu = base64_decode($waktu);
        $rowToUpdate = Absensi::where('id_siswa', $id_siswa)
        ->where('id_kelas', $idkelas)
        ->where('waktu', $waktu)
        ->first();
        if($rowToUpdate){
            $rowToUpdate->update([
                'status' => 'Alfa',
            ]);
        }    
        return redirect('/daftarSiswa/'.$id_kelas)->with('success');
    }
}
