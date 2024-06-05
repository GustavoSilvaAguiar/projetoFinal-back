<?php

namespace App\DTO;

use App\Http\Requests\InfoNutricionalRequest;

class InfoNutricionalDTO
{
    public function __construct(
        public ?int $id,
        public string $porcao,
        public string $unidade_medida,
        public string $calorias,
        public string $gorduras,
        public string $carboidratos,
        public string $proteinas,
        public int $idproduto,
        public ?string $alergenicos,
        public string $ingredientes

    ) {
    }

    public static function makeFromRequest(InfoNutricionalRequest $request): self
    {
        return new self(

            $request?->id,
            $request->porcao,
            $request->unidade_medida,
            $request->calorias,
            $request->gorduras,
            $request->carboidratos,
            $request->proteinas,
            $request->idproduto,
            $request?->alergenicos,
            $request->ingredientes
        );
    }
}
