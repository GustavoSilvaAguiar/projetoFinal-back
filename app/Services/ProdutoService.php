<?php

namespace App\Services;

use App\Repositories\Produto\ProdutoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ProdutoService
{
    public function __construct(
        protected ProdutoRepositoryInterface $repository
    )
    {
    }

    public function getAllProdutos(Request $request): LengthAwarePaginator{
        return $this->repository->getAllProdutos($request);
    }
}
