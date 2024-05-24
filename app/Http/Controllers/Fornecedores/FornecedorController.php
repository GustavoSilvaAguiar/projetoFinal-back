<?php

namespace App\Http\Controllers\Fornecedores;

use App\Http\Controllers\Controller;
use App\Services\FornecedorService;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function __construct(
        protected FornecedorService $service
    )
    {
        
    }

    public function getAllFornecedores(Request $request) {
        return $this->service->getAllFornecedores($request);
    }

    public function getAllFornecedoresPaginado(Request $request) {
        return $this->service->getAllFornecedoresPaginado($request);
    }
}
