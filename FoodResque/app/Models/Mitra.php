<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'mitra_id'; // Sesuaikan dengan nama primary key Anda
    protected $fillable = [
        'username',
        'nama_mitra',
        'alamat',
        'no_telp',
    ];
}
