<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode', 'nama',
    ];
    protected $casts = [
        'created_at' => 'datetime:d-m-y',
        'updated_at' => 'datetime:d-m-y',
    ];

    public function kecamatan()
    {
        return $this->belongsTo('App\Models\Kelurahan', 'kelurahan_id');
    }
}
