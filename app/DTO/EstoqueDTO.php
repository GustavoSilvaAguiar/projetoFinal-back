<?php

namespace App\DTO;

use App\Http\Requests\EstoquePostUpdateRequest;

class EstoqueDTO
{
    public function __construct(
        public ?string $id,
        public int $idproduto,
        //public ?string $data,
        public int $idusuario,
        public int $idfornecedor,
        public ?string $observacao,
        public int $qtd_estoque,
        public string $lcz_estoque,
        public string $data_validade,
        public string $lote,
        public string $tipo_operacao
    ) {
    }

    public static function makeFromRequest(EstoquePostUpdateRequest $request): self {
        return new self(
            $request?->id,
            $request->idproduto,
            //$request?->data,
            $request->idusuario,
            $request->idfornecedor,
            $request?->observacao,
            $request?->qtd_estoque,
            $request?->lcz_estoque,
            $request?->data_validade,
            $request?->lote,
            $request?->tipo_operacao
        );
    }
}
