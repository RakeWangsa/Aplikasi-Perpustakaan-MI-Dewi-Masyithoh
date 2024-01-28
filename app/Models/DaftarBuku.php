<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBuku extends Model
{
    use HasFactory;
    protected $table = "daftar_buku";
    public $timestamps = false;
    protected $fillable = [
        'nama',
    ];
}
