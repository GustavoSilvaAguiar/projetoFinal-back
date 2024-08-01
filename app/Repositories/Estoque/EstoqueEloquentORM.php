<?php

namespace App\Repositories\Estoque;

use App\DTO\EstoqueDTO;
use App\Models\Estoque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstoqueEloquentORM implements EstoqueRepositoryInterface
{
    public function __construct(
        protected Estoque $model
    ) {
    }

    public function getEstoque(Request $request)
    {
        // Query para buscar todas as operações
        $query = $this->model->with('produto.marca', 'fornecedor')
            ->where(function ($query) use ($request) {
                !is_null($request->operacao) ? $query->where('tipo_operacao', $request->operacao) : '';
                !is_null($request->lote) ? $query->where('lote', $request->lote) : '';
                !is_null($request->produto) ? $query->whereHas('produto', function ($query) use ($request) {
                    $query->where('nome', $request->produto);
                }) : '';
                !is_null($request->fornecedor) ? $query->whereHas('fornecedor', function ($query) use ($request) {
                    $query->where('id', $request->fornecedor);
                }) : '';
                !is_null($request->marca) ? $query->whereHas('produto.marca', function ($query) use ($request) {
                    $query->where('id', $request->marca);
                }) : '';
                !is_null($request->data_cadastro_maior) ? $query->where('data', '>=', $request->data_cadastro_maior) : '';
                !is_null($request->data_cadastro_menor) ? $query->where('data', '<', $request->data_cadastro_menor) : '';
                !is_null($request->data_validade_maior) ? $query->where('data_validade', '>=', $request->data_validade_maior) : '';
                !is_null($request->data_validade_menor) ? $query->where('data_validade', '<', $request->data_validade_menor) : '';
            });

        // Obter todas as operações para cálculo das somas
        $operacoes = $query->get();

        // Calcular a diferença de estoque por produto
        $diferencaEstoquePorProduto = $operacoes->groupBy('idproduto')->map(function ($operacoesPorProduto) {
            $entradas = $operacoesPorProduto->where('tipo_operacao', 'entrada')->sum('qtd_estoque');
            $saidas = $operacoesPorProduto->where('tipo_operacao', 'saída')->sum('qtd_estoque');
            return $entradas - $saidas;
        });

        // Paginar os resultados
        $paginado = $query->orderBy('data', 'desc')->paginate();

        // Adicionar a diferença de estoque no payload de cada produto
        $paginado->getCollection()->transform(function ($operacao) use ($diferencaEstoquePorProduto) {
            $operacao->total_estoque = $diferencaEstoquePorProduto[$operacao->idproduto] ?? 0;
            return $operacao;
        });

        return response()->json($paginado);
    }

    public function postEstoque(EstoqueDTO $dto)
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }
}
