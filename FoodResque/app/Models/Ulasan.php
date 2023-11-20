<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'mitra_id',
        'makanan_id',
        'isi_ulasan',
    ];

    public function mitra():BelongsTo
    {
        return $this->belongsTo(Mitra::class, 'mitra_id', 'id');
    }

    public function makanan():BelongsTo
    {
        return $this->belongsTo(Makanan::class, 'makanan_id', 'id');
    }
}
