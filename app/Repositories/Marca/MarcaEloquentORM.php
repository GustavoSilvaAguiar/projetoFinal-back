<?php

namespace App\Repositories\Marca;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaEloquentORM implements MarcaRepositoryInterface
{

    public function __construct(
        protected Marca $model
    ) {
    }

    public function getAllMarcas(Request $request)
    {
        return $this->model->get();
    }

    public function getAllMarcasPaginado(Request $request) {
        return $this->model->paginate($perPage=2);
    }
}
