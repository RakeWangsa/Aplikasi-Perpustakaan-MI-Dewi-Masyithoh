<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomorBuku extends Model
{
    use HasFactory;
    protected $table = "nomor_buku";
    public $timestamps = false;
    protected $fillable = [
        'id_buku',
        'nomor_buku',
    ];
}
