<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proximidade extends Model
{
    use HasFactory;

    public function imoveis(){
        return $this->belongsToMany(Imovel::class)->withTimestamps();
    }
}
