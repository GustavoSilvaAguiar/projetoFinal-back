<?php

namespace App\Repositories\Fornecedor;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorEloquentORM implements FornecedorRepositoryInterface
{
    public function __construct(
        protected Fornecedor $model
    ) {
    }

    public function getAllFornecedores(Request $request)
    {
        return $this->model->get();
    }

    public function getAllFornecedoresPaginado(Request $request)
    {
        return $this->model->where(function ($query) use ($request) {
            !is_null($request->nome) ? $query->where('nome', 'ILIKE', '%'.$request->nome.'%') : '';
        })->paginate($perPage=2);
    }
}
