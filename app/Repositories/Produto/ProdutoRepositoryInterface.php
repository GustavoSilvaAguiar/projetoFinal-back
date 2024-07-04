<?php

namespace App\Repositories\Produto;

use App\DTO\ProdutoDTO;
use Illuminate\Http\Request;

interface ProdutoRepositoryInterface {
    public function getAllProdutos(Request $request);
    public function postProduto(ProdutoDTO $dto);
    public function putProduto(ProdutoDTO $dto);
    public function getAllProdutosNoPagination();
    public function getProdutoDetail(Request $request);
}