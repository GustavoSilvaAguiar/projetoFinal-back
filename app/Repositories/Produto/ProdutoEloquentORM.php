<?php

namespace App\Repositories\Produto;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoEloquentORM implements ProdutoRepositoryInterface
{
    public function __construct(protected Produto $model)
    {
    }

    public function getAllProdutos(Request $request)
    {
        //dd($request->nome);
        return $this->model->where(function ($query) use ($request) {
            !is_null($request->nome) ? $query->where('nome', $request->nome) : '';
            !is_null($request->venda_maior) ? $query->where('preco_venda', '>=', $request->venda_maior) : '';
            !is_null($request->venda_menor) ? $query->where('preco_venda', '<', $request->venda_menor) : '';
            !is_null($request->custo_maior) ? $query->where('preco_custo', '>=', $request->custo_maior) : '';
            !is_null($request->custo_menor) ? $query->where('preco_custo', '<', $request->custo_menor) : '';
            /* if ($request->nome || $request->maior_q) {
                $query->where('nome', $request->nome);
                $query->where('preco_venda', '>=', $request->maior_q);
            } */
        })->paginate($perPage = 4);
    }
}
