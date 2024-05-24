<?php

namespace App\Http\Controllers\Produtos;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutoPostUpdateRequest;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(
        protected ProdutoService $service
    ) {
    }

    public function getAllProdutos(Request $request)
    {
        $produtos = $this->service->getAllProdutos($request);
        return $produtos;
    }

    public function getAllProdutosNoPage() {
        $produtos = $this->service->getAllProdutosNoPagination();

        return $produtos;
    }

    public function postProduto(ProdutoPostUpdateRequest $request) {
        $response = $this->service->postProduto($request);
        return $response;
    }

    public function putProduto(ProdutoPostUpdateRequest $request) {
        $response = $this->service->putProduto($request);
        return $response;
    }
}
