<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSiswa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'daftar_siswa';
    protected $fillable = ['id','nisn', 'nama', 'kelas'];
}
