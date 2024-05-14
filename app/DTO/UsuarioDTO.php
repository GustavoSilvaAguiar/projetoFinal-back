<?php

namespace App\DTO;

use App\Http\Requests\UsuarioPostUpdateRequest;

class UsuarioDTO {
    public function __construct(
        public ?string $id,
        public string $nome,
        public string $cpf,
        public ?int $idendereco,
        public ?int $idcontato
    )
    {
        
    }

    public static function makeFromRequest(UsuarioPostUpdateRequest $request): self {
        return new self(
            $request?->id,
            $request->nome,
            $request->cpf,
            $request?->idendereco,
            $request?->idcontato
        );
    }
}