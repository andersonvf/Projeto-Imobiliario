<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $table = "enderecos";

    protected $fillable = [
        'rua',
        'numero',
        'complemento',
        'bairro'
    ];

    public function imovel(){
        return $this->belongsTo(Imovel::class);
    }
}
