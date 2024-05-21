<?php

namespace App\Services;

use App\DTO\CategoriaDTO;
use App\Http\Requests\CategoriaPostUpdateRequest;
use App\Repositories\Categoria\CategoriaRepositoryInterface;
use stdClass;

class CategoriaService {
    public function __construct(
        protected CategoriaRepositoryInterface $repository
    )
    {
        
    }

    public function getAllCategoria() {
        return $this->repository->getAllCategorias();
    }

    public function postCategoria(CategoriaDTO $dto): stdClass | null {
        return $this->repository->postCategoria($dto);
    }
}