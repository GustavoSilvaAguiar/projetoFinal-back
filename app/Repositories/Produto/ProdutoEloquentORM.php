<?php

namespace App\Repositories\Produto;

use App\DTO\ProdutoDTO;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProdutoEloquentORM implements ProdutoRepositoryInterface
{
    public function __construct(protected Produto $model)
    {
    }

    public function getAllProdutos(Request $request)
    {
        return $this->model->with('categoria', 'marca')->where(function ($query) use ($request) {
            !is_null($request->nome) ? $query->where('nome', 'ILIKE', '%'.$request->nome.'%') : '';
            !is_null($request->venda_maior) ? $query->where('preco_venda', '>=', $request->venda_maior) : '';
            !is_null($request->venda_menor) ? $query->where('preco_venda', '<', $request->venda_menor) : '';
            !is_null($request->custo_maior) ? $query->where('preco_custo', '>=', $request->custo_maior) : '';
            !is_null($request->custo_menor) ? $query->where('preco_custo', '<', $request->custo_menor) : '';
            !is_null($request->categoria) ? $query->whereHas('categoria', function ($query) use ($request) {
                $query->where('id', $request->categoria);
            }) : '';
            !is_null($request->marca) ? $query->whereHas('marca', function ($query) use ($request) {
                $query->where('id', $request->marca);
            }) : '';
        })->paginate();
    }

    public function getProdutoDetail(Request $request) {
        $response = $this->model->with('categoria', 'marca')->find($request->id);

        return $response;
    }

    public function postProduto(ProdutoDTO $dto)
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }

    public function putProduto(ProdutoDTO $dto)
    {
        $produto = $this->model->find($dto->id);
        if (!$produto) {
            return null;
        }

        $produto->update((array) $dto);

        return (object) $produto->toArray();
    }

    public function getAllProdutosNoPagination()
    {
        return $this->model->get();

    }
}
