<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['id','ruang', 'pelajaran', 'hari', 'waktu', 'guru', 'tahun_ajaran', 'code_absen', 'waktu_absen'];
}
