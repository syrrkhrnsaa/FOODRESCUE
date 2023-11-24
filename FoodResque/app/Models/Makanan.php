<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Makanan extends Model
{
    use HasFactory;

    protected $table = 'makanan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_menu',
        'jumlah_makanan',
        'tanggal_expired',
        'waktu',
        'status',
        'donatur_id',
        'mitra_id',
        'foto'
    ];

    public function donatur():BelongsTo
    {
        return $this->belongsTo(Donatur::class, 'donatur_id', 'id');
    }

    public function mitra():BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id');
    }

    public function ulasan():HasMany
    {
        return $this->hasMany(Ulasan::class, 'makanan_id', 'id');
    }
}
