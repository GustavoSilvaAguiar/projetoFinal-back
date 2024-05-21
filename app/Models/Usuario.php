<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'nome',
        'cpf',
        'senha',
        'login'
    ];

    public $timestamps = false;

    public function endereco(): BelongsTo {
        return $this->BelongsTo(Endereco::class, 'idendereco');
    }

    public function contato(): BelongsTo {
        return $this->belongsTo(Contato::class, 'idcontato');
    }
}
