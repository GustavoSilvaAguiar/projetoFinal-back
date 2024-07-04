<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'descricao', 'und_medida', 'preco_custo', 'preco_venda', 'idusuario', 'idcategoria', 'idmarca'
    ];

    public $timestamps = false;

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }

    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class, 'idmarca');
    }
}
