<?php

namespace App\DTO;

use App\Http\Requests\MarcaPostUpdateRequest;

class MarcaDTO
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public ?int $idusuario
    ) {
    }

    public static function makeFromRequest(MarcaPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->nome,
            $request->idusuario,

        );
    }
}
