<?php

namespace App\Repositories\Estoque;

use App\DTO\EstoqueDTO;
use Illuminate\Http\Request;

interface EstoqueRepositoryInterface
{
    public function getEstoque(Request $request);
    public function postEstoque(EstoqueDTO $dto);
}
