<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    protected $fillable = ['id','tanggal', 'kelas', 'guru', 'jam', 'pelajaran', 'bahasan', 'kehadiran', 'tahun_ajaran','tugas'];
}
