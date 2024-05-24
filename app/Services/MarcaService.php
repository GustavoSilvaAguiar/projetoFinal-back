<?php

namespace App\Services;

use App\Repositories\Marca\MarcaRepositoryInterface;
use Illuminate\Http\Request;

class MarcaService {
    public function __construct(
        protected MarcaRepositoryInterface $repository
    )
    {
        
    }

    public function getAllMarcas(Request $request) {
        return $this->repository->getAllMarcas($request);
    }

    public function getAllMarcasPaginado(Request $request) {
        return $this->repository->getAllMarcasPaginado($request);
    }
}