<?php

namespace App\Repositories\Categoria;

use App\DTO\CategoriaDTO;
use App\Http\Requests\CategoriaPostUpdateRequest;
use stdClass;

interface CategoriaRepositoryInterface {
    public function getAllCategorias();
    public function postCategoria(CategoriaDTO $dto): stdClass | null;
}