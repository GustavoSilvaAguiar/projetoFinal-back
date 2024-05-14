<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'idendereco',
        'idcontato'
    ];

    public $timestamps = false;

    /* public function enderecos() {
        return $this->hasMany(Endereco::class, 'idendereco');
    } */
}
