<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InfoNutricional extends Model
{
    use HasFactory;

    protected $table = 'info_nutricionais';

    protected $fillable = [
        'alergenicos',
        'calorias',
        'carboidratos',
        'gorduras',
        'idproduto',
        'ingredientes',
        'porcao',
        'proteinas',
        'unidade_medida'


    ];

    public $timestamps = false;

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class, 'idproduto');
    }
}
