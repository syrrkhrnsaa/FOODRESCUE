<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan';
    protected $primarykey = 'makanan_id';
    protected $fillabe = [
        'nama_Menu',
        'jumlah_Makanan',
        'tanggal_Expired',
        'waktu',
        'status',
    ];
}
