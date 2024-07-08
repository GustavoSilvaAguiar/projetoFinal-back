<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoque';

    public $timestamps = false;

    protected $fillable = [
        'qtd_estoque', 'lcz_estoque', /* 'data', */ 'idproduto', 'idfornecedor', 'data_validade', 'lote', 'tipo_operacao', 'idusuario', 'observacao'
    ];

    public function produto(): BelongsTo{
        return $this->belongsTo(Produto::class, 'idproduto');
    }

    public function fornecedor(): BelongsTo{
        return $this->belongsTo(Fornecedor::class, 'idfornecedor');
    }
}
