<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class waktuAbsen extends Model
{
    use HasFactory;
    protected $table = 'waktuAbsen';
    protected $fillable = ['id', 'id_kelas', 'waktu'];
}
