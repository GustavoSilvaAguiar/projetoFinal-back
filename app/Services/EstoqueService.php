<?php

namespace App\Services;

use App\DTO\EstoqueDTO;
use App\Http\Requests\EstoquePostUpdateRequest;
use App\Repositories\Estoque\EstoqueRepositoryInterface;
use Illuminate\Http\Request;

class EstoqueService
{
    public function __construct(
        protected EstoqueRepositoryInterface $repository
    ) {
    }

    public function getEstoque(Request $request)
    {
        return $this->repository->getEstoque($request);
    }

    public function postEstoque(EstoquePostUpdateRequest $request) {
        return $this->repository->postEstoque(EstoqueDTO::makeFromRequest($request));
    }
}
