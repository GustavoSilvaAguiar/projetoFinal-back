<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'bairro',
        'rua',
        'numero',
        'cep',
        'idcidade'
    ];

    public $timestamps = false;
    /* public function usuarios()
    {
        return $this->belongsTo(Usuario::class, 'idendereco');
    } */
}
