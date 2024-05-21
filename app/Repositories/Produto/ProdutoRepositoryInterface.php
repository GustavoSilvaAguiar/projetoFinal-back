<?php

namespace App\Repositories\Produto;

use Illuminate\Http\Request;

interface ProdutoRepositoryInterface {
    public function getAllProdutos(Request $request);
}