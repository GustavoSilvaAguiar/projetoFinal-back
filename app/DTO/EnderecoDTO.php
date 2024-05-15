<?php

namespace App\DTO;

use App\Http\Requests\EnderecoPostUpdateRequest;

class EnderecoDTO
{
    public function __construct(
        public ?int $id,
        public string $bairro,
        public string $rua,
        public int $numero,
        public int $cep,
        public int $idcidade
    ) {
    }

    public static function makeFromRequest(EnderecoPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->bairro,
            $request->rua,
            $request->numero,
            $request->cep,
            $request->idcidade
        );
    }
}
