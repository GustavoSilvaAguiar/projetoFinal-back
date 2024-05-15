<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf'
    ];

    public $timestamps = false;

    public function endereco(): BelongsTo {
        return $this->BelongsTo(Endereco::class, 'idendereco');
    }

    public function contato(): BelongsTo {
        return $this->belongsTo(Contato::class, 'idcontato');
    }
}
