<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Absensi;
use App\Models\KelasSiswa;
use Illuminate\Support\Facades\Hash;

class ManagementController extends Controller
{
    public function managementUserGuru()
    {
        $guru = DB::table('Users')
        ->where('role','guru')
        ->select('id', 'name', 'email','nomor')
        ->orderBy('nomor')
        ->get();
        // $siswa = DB::table('Users')
        // ->where('role','siswa')
        // ->select('id', 'name', 'email','nomor')
        // ->get();

        return view('managementUser.manage', [
            'title' => 'Management User Guru',
            'active' => 'management user',
            'guru' => $guru,
            // 'siswa' => $siswa,
        ]);
    }

    public function managementUserSiswa()
    {
        // $guru = DB::table('Users')
        // ->where('role','guru')
        // ->select('id', 'name', 'email','nomor')
        // ->get();
        $siswa = DB::table('Users')
        ->where('role','siswa')
        ->select('id', 'name', 'email','nomor')
        ->orderBy('nomor')
        ->get();

        return view('managementUser.manage', [
            'title' => 'Management User Guru',
            'active' => 'management user',
            // 'guru' => $guru,
            'siswa' => $siswa,
        ]);
    }

    public function managementUserGuruSearch(Request $request)
    {
        $search=$request->nama;
        $guru = DB::table('Users')
        ->where('role','guru')
        ->where('name',$search)
        ->select('id', 'name', 'email','nomor')
        ->orderBy('nomor')
        ->get();
        // $siswa = DB::table('Users')
        // ->where('role','siswa')
        // ->where('name',$search)
        // ->select('id', 'name', 'email','nomor')
        // ->get();

        return view('managementUser.manage', [
            'title' => 'Management User',
            'active' => 'management user',
            'guru' => $guru,
            // 'siswa' => $siswa,
            'search' => $search
        ]);
    }

    public function managementUserSiswaSearch(Request $request)
    {
        $search=$request->nama;
        // $guru = DB::table('Users')
        // ->where('role','guru')
        // ->where('name',$search)
        // ->select('id', 'name', 'email','nomor')
        // ->get();
        $siswa = DB::table('Users')
        ->where('role','siswa')
        ->where('name',$search)
        ->select('id', 'name', 'email','nomor')
        ->orderBy('nomor')
        ->get();

        return view('managementUser.manage', [
            'title' => 'Management User',
            'active' => 'management user',
            // 'guru' => $guru,
            'siswa' => $siswa,
            'search' => $search
        ]);
    }

    public function tambah(Request $request)
    {
        return view('register.registerGuru', [
            'title' => 'Register Guru',
            'active' => 'register guru',
        ]);
    }

    public function store(Request $request)
    {
        if($request->password!=$request->password2){
            return redirect('/registerGuru')->with('loginError', 'Registrasi Gagal! Kolom Password dan Konfirmasi Password harus sesuai!');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'nomor' => 'required|unique:users',
            'password' => 'required|min:8|max:255'
        ]);
        $validatedData['role'] = 'guru';
        //$validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        //$request->session()->flash('success', 'Registration successfully! Please login!');

        return redirect('/managementUser/guru')->with('success', 'Registrasi Berhasil!');
    }

    public function editUser($id)
    {
        $id = base64_decode($id);
        $user = DB::table('Users')
        ->where('id',$id)
        ->select('id', 'name', 'email', 'nomor')
        ->get();
        $role = DB::table('Users')
        ->where('id',$id)
        ->pluck('role')
        ->first();
        return view('managementUser.editUser', [
            "title" => "Edit User",
            'active' => 'edit user',
            'user' => $user,
            'id' => $id,
            'role' => $role
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $id = base64_decode($id);
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:dns|unique:users,email,'.$id,
            'nomor' => 'required|unique:users,nomor,'.$id,
            'password' => 'nullable|min:5|max:255'
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['nama'];
        $user->email = $validatedData['email'];
        $user->nomor = $validatedData['nomor'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();
        $role = DB::table('Users')
        ->where('id',$id)
        ->pluck('role')
        ->first();
        if($role=="guru"){
            return redirect('/managementUser/guru')->with('success', 'Data user berhasil diupdate!');
        }else{
            return redirect('/managementUser/siswa')->with('success', 'Data user berhasil diupdate!');
        }
        
    }

    public function hapusUser($id)
    {
        $id = base64_decode($id);
        $role = DB::table('Users')
        ->where('id',$id)
        ->pluck('role')
        ->first();
        User::where('id', $id)->delete();
        if($role=="siswa"){
            Absensi::where('id_siswa',$id)->delete();
            KelasSiswa::where('id_siswa',$id)->delete();
        }
        
        
        if($role=="guru"){
            return redirect('/managementUser/guru')->with('success', 'Data user berhasil dihapus!');
        }else{
            return redirect('/managementUser/siswa')->with('success', 'Data user berhasil dihapus!');
        }
    }
}
