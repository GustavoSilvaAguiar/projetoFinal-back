<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'idusuario'
    ];

    public $timestamps = false;

    public function contato(): BelongsTo
    {
        return $this->belongsTo(Contato::class, 'idcontato');
    }
}
