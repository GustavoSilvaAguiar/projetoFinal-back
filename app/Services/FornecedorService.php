<?php

namespace App\Services;

use App\DTO\ContatoDTO;
use App\DTO\FornecedorDTO;
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

    public function postFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO) {
        return $this->repository->postFornecedor($dto, $contatoDTO);
    }

    public function putFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO) {
        return $this->repository->putFornecedor($dto, $contatoDTO);
    }
}