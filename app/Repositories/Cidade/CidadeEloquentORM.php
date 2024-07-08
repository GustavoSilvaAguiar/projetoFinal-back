<?php

namespace App\Repositories\Cidade;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeEloquentORM implements CidadeRepositoryInterface {
    public function __construct(
        protected Cidade $model
    )
    {
        
    }

    public function getAllCidades(Request $request)
    {
        return $this->model->with('estado')->get();
    }
}