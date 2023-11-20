<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donatur'; // Sesuaikan dengan nama tabel yang digunakan di database

    protected $fillable = [
        'username',
        'nama_donatur',
        'alamat',
        'no_telp'
    ];

    public $timestamps = true; // Sesuaikan dengan kebutuhan Anda

    public function Have():HasMany
    {
        //foreign ke local
        return $this->hasMany(Makanan::class, 'donatur_id','id');
    }
}
