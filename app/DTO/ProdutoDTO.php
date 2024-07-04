<?php

namespace App\DTO;

use App\Http\Requests\ProdutoPostUpdateRequest;

class ProdutoDTO
{
    public function __construct(
        public ?string $id,
        public string $nome,
        public string $descricao,
        public string $und_medida,
        public string $preco_custo,
        public string $preco_venda,
        public int $idusuario,
        public int $idcategoria,
        public int $idmarca
    ) {
    }

    public static function makeFromRequest(ProdutoPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->nome,
            $request->descricao,
            $request->und_medida,
            $request->preco_custo,
            $request->preco_venda,
            $request->idusuario,
            $request->idcategoria,
            $request->idmarca
        );
    }
}
