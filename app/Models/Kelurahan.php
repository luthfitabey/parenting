<?php

namespace App\Models;

use App\Kecamatan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'kecamatan_id', 'kode', 'nama',
    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-y',
        'updated_at' => 'datetime:d-m-y',
    ];

public function kecamatan()
{
    return $this->hasOne(Kecamatan::class);
}

}