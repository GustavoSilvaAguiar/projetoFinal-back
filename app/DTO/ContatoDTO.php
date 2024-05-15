<?php

namespace App\DTO;

use App\Http\Requests\ContatoPostUpdateRequest;

class ContatoDTO
{
    public function __construct(
        public ?int $id,
        public string $telefone,
        public string $email,
        public int $ddd
    ) {
    }

    public static function makeFromRequest(ContatoPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->telefone,
            $request->email,
            $request->ddd
        );
    }
}
