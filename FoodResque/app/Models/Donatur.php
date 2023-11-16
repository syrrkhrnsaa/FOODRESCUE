<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donatur_table';
    protected $fillable = [
        'donatur_id',
            'username',
            'nama_donatur',
            'alamat',
            'no_telp'
    ];
    public $timestamps = true;
    
}
