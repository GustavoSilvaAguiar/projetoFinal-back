<?php

namespace App\DTO;

use App\Http\Requests\FornecedorPostUpdateRequest;

class FornecedorDTO
{

    public function __construct(
        public ?int $id,
        public string $nome,
        public int $idusuario,
        public ?int $idcontato
    ) {
    }

    public static function makeFromRequest(FornecedorPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->nome,
            $request->idusuario,
            $request?->idcontato
        );
    }
}
