<?php

namespace App\Services;

use App\DTO\ContatoDTO;
use App\DTO\MarcaDTO;
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

    public function postMarca(MarcaDTO $dto) {
        return $this->repository->postMarca($dto);
    }

    public function putMarca(MarcaDTO $dto) {
        return $this->repository->putMarca($dto);
    }
}