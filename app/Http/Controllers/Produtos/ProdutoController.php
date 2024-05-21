<?php

namespace App\Http\Controllers\Produtos;

use App\Http\Controllers\Controller;
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
}
