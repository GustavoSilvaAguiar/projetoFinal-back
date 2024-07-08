<?php

namespace App\DTO;

use App\Http\Requests\CategoriaPostUpdateRequest;
use Illuminate\Http\UploadedFile;
use Symfony\Component\String\ByteString;

class CategoriaDTO
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public int $idusuario,
        public ?UploadedFile $img
    ) {
    }

    public static function makeFromRequest(CategoriaPostUpdateRequest $request): self
    {
        return new self(
            $request?->id,
            $request->nome,
            $request->idusuario,
            $request?->img
        );
    }
}
