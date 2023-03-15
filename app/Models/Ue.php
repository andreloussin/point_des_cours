<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    use HasFactory;

    public function ecus()
    {
        return $this->hasMany(Ecu::class);
    }
}
