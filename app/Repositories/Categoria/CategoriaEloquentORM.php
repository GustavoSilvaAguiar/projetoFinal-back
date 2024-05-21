<?php

namespace App\Repositories\Categoria;

use App\DTO\CategoriaDTO;
use App\Http\Requests\CategoriaPostUpdateRequest;
use App\Models\Categoria;
use stdClass;

class CategoriaEloquentORM implements CategoriaRepositoryInterface
{

    public function __construct(
        protected Categoria $model
    ) {
    }

    public function getAllCategorias()
    {
        return $this->model->get()->toArray();
    }

    public function postCategoria(CategoriaDTO $dto): stdClass | null
    {
        $catagoriaImgName = time() . '_' . $dto->img->getClientFilename();
        
        $reponse = $this->model->create((array) $dto);

        return (object) $reponse->toArray();
    }
}
