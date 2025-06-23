<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stunting extends Model
{
    use HasFactory;

    protected $fillable = ['balita_id', 'isStunting', 'bulan_timbang'];

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }

    public function prevStunting()
    {
        return $this->hasMany(PrevStunting::class);
    }
}
