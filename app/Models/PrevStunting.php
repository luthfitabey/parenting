<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrevStunting extends Model
{
    use HasFactory;

    protected $fillable = ['prevalensi_eppgbm', 'prevalensi_ski', 'stunting_id'];

    public function stunting()
    {
        return $this->belongsTo(Stunting::class);
    }
}