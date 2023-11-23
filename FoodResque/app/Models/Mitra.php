<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mitra extends Model
{
    use HasFactory;

    protected $table = 'mitra';
    protected $primaryKey = 'id'; // Sesuaikan dengan nama primary key Anda
    protected $fillable = [
        'username',
        'nama_mitra',
        'alamat',
        'no_telp',
    ];

    public function makanan():HasMany
    {
        return $this->hasMany(Makanan::class, 'mitra_id', 'id');
    }

    public function ulasan():HasMany
    {
        return $this->hasMany(Ulasan::class, 'mitra_id', 'id');
    }
}
