<?php

namespace App\Repositories\Fornecedor;

use Illuminate\Http\Request;

interface FornecedorRepositoryInterface {
    public function getAllFornecedores(Request $request);
    public function getAllFornecedoresPaginado(Request $request);
}