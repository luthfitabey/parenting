<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'balitas';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'kelurahan_id',
        'alamat_lengkap',
        'tinggi_badan',
        'massa_badan',
    ];

    // Relasi ke model Kelurahan
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    // Relasi ke model Stunting (One-to-One)
    public function stunting()
    {
        return $this->hasOne(Stunting::class, 'balita_id');
    }
}
