<?php

namespace App\Services;

use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use Illuminate\Http\Request;

class FornecedorService {
    public function __construct(
        protected FornecedorRepositoryInterface $repository
    )
    {
        
    }

    public function getAllFornecedores(Request $request) {
        return $this->repository->getAllFornecedores($request);
    }

    public function getAllFornecedoresPaginado(Request $request) {
        return $this->repository->getAllFornecedoresPaginado($request);
    }
}