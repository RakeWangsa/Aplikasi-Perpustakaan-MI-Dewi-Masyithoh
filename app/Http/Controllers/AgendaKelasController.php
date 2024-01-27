<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;

class AgendaKelasController extends Controller
{

    public function agendaKelas()
    {
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
        $tanggal = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('tanggal')
        ->distinct()
        ->get();
        $kelas = DB::table('agenda')
        ->select('kelas')
        ->distinct()
        ->get();
        $agenda = DB::table('agenda')
        ->where('tahun_ajaran',$tahunAjaran)
        ->select('*')
        ->get();
        
        return view('admin.agendaKelas', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function agendaKelasSearch(Request $request)
    {
        if($request->kelas=="Semua Kelas" && $request->date==NULL){
            return redirect('/agendaKelas');
        }
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

        if($request->kelas=="Semua Kelas"){
            $kelas = DB::table('agenda')
            ->select('kelas')
            ->distinct()
            ->get();
        }else{
            $kelas = DB::table('agenda')
            ->select('kelas')
            ->where('kelas',$request->kelas)
            ->distinct()
            ->get();
        }

        if($request->date==NULL){
            $tanggal = DB::table('agenda')
            ->where('tahun_ajaran',$tahunAjaran)
            ->select('tanggal')
            ->distinct()
            ->get();
            $agenda = DB::table('agenda')
            ->where('tahun_ajaran',$tahunAjaran)
            ->select('*')
            ->get();
        }else{
            $tanggal = DB::table('agenda')
            ->where('tanggal',$request->date)
            ->select('tanggal')
            ->distinct()
            ->get();
            $agenda = DB::table('agenda')
            ->where('tanggal',$request->date)
            ->select('*')
            ->get();
        }
        
        return view('admin.agendaKelas', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function agendaKelasCetak(Request $request)
    {
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
        // $tanggal = DB::table('agenda')
        // ->where('tahun_ajaran',$tahunAjaran)
        // ->select('tanggal')
        // ->distinct()
        // ->get();
        // $kelas = DB::table('agenda')
        // ->where('kelas',$cetak)
        // ->select('kelas')
        // ->distinct()
        // ->get();
        // $agenda = DB::table('agenda')
        // ->where('tahun_ajaran',$tahunAjaran)
        // ->select('*')
        // ->get();
        if($request->kelas=="Semua Kelas"){
            $kelas = DB::table('agenda')
            ->select('kelas')
            ->distinct()
            ->get();
            $cetak = $request->kelas;
        }else{
            $kelas = DB::table('agenda')
            ->select('kelas')
            ->where('kelas',$request->kelas)
            ->distinct()
            ->get();
            $cetak = $request->kelas;
        }

        if($request->date==NULL){
            $tanggal = DB::table('agenda')
            ->where('tahun_ajaran',$tahunAjaran)
            ->select('tanggal')
            ->distinct()
            ->get();
            $agenda = DB::table('agenda')
            ->where('tahun_ajaran',$tahunAjaran)
            ->select('*')
            ->get();
        }else{
            $tanggal = DB::table('agenda')
            ->where('tanggal',$request->date)
            ->select('tanggal')
            ->distinct()
            ->get();
            $agenda = DB::table('agenda')
            ->where('tanggal',$request->date)
            ->select('*')
            ->get();
        }
        return view('admin.agendaKelasCetak', [
            'title' => 'Agenda Kelas',
            'active' => 'agenda kelas',
            'agenda' => $agenda,
            'tanggal' => $tanggal,
            'kelas' => $kelas,
            'cetak' => $cetak,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function buatAgendaKelas()
    {
        $hariIni = Carbon::now()->addHours(7)->toDateString();
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->get();
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
        return view('guru.buatAgendaKelas', [
            'title' => 'Buat Agenda Kelas',
            'active' => 'agenda kelas',
            'hariIni' => $hariIni,
            'guru' => $guru,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    public function submitAgendaKelas(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi ',
            'kelas.required' => 'Pilih Kelas!',
            'kelas.not_in' => 'Pilih Kelas!',
            'guru.required' => 'Pilih Guru!',
            'guru.not_in' => 'Pilih Guru!',
            'pelajaran.required' => 'Pilih Pelajaran!',
            'pelajaran.not_in' => 'Pilih Pelajaran!',
        ];

        $this->validate($request, [
            'guru' => ['required', Rule::notIn(['Pilih Guru!'])],
            'kelas' => ['required', Rule::notIn(['Pilih Kelas!'])],
            'pelajaran' => ['required', Rule::notIn(['Pilih Pelajaran!'])],
        ], $messages);

        // dd($request->tgl,$request->kelas,$request->guru,$request->jam,$request->pelajaran,$request->bahasan,$request->kehadiran);
        if($request->kehadiran=="hadir"){
            $kehadiran="hadir";
        }else{
            $kehadiran="tidak hadir";
        }
        Agenda::insert([
                'tanggal' => $request->tgl,
                'tahun_ajaran' => $request->tahun_ajaran,
                'kelas' => $request->kelas,
                'guru' => $request->guru,
                'jam' => $request->jam,
                'pelajaran' => $request->pelajaran,
                'bahasan' => $request->bahasan,
                'tugas' => $request->tugas,
                'kehadiran' => $kehadiran,
            ]);

        return redirect('/home/guru')->with('success');
    }

    public function absensiGuru()
    {
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
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->orderBy('name')
        ->get();
        $month=[7,8,9,10,11,12,1,2,3,4,5,6];
        return view('admin.absensiGuru', [
            'title' => 'Absensi Guru',
            'active' => 'absensi guru',
            'guru' => $guru,
            'tahunAjaran' => $tahunAjaran,
            'month' => $month
        ]);
    }

    public function absensiGuruCetak()
    {
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
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('*')
        ->orderBy('name')
        ->get();
        $month=[7,8,9,10,11,12,1,2,3,4,5,6];
        return view('admin.absensiGuruCetak', [
            'title' => 'Absensi Guru',
            'active' => 'absensi guru',
            'guru' => $guru,
            'tahunAjaran' => $tahunAjaran,
            'month' => $month
        ]);
    }
}
