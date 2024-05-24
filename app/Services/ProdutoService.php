<?php

namespace App\Services;

use App\DTO\ProdutoDTO;
use App\Http\Requests\ProdutoPostUpdateRequest;
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

    public function getAllProdutosNoPagination() {
        return $this->repository->getAllProdutosNoPagination();
    }

    public function postProduto(ProdutoPostUpdateRequest $request) {
        return $this->repository->postProduto(ProdutoDTO::makeFromRequest($request));
    }

    public function putProduto(ProdutoPostUpdateRequest $request) {
        return $this->repository->putProduto(ProdutoDTO::makeFromRequest($request));
    }
}
