<?php

namespace App\Repositories\Charts;

use App\Models\Estoque;
use Illuminate\Support\Facades\DB;

class ChartsEloquentORM implements ChartsRepositoryInterface
{
    public function __construct(
        protected Estoque $estoqueModel
    ) {
    }

    public function getBestSellers()
    {
        /* $result = $this->estoqueModel
            ->join('produtos', 'estoque.idproduto', '=', 'produtos.id')
            ->select('produtos.nome as produto', DB::raw('SUM(estoque.qtd_estoque * produtos.preco_venda) as valor'))
            ->where('estoque.tipo_operacao', 'saída')
            ->where('estoque.data', '>=', DB::raw('CURRENT_DATE - INTERVAL 6 MONTH'))
            ->groupBy('produtos.id')
            ->orderByDesc('valor')
            ->limit(10)
            ->get();
 */
        $result = $this->estoqueModel
            ->join('produtos', 'estoque.idproduto', '=', 'produtos.id')
            ->select('produtos.nome as produto', DB::raw('SUM(estoque.qtd_estoque * produtos.preco_venda) as valor'))
            ->where('estoque.tipo_operacao', 'saída')
            ->where('estoque.data', '>=', DB::raw("CURRENT_DATE - INTERVAL '6 months'"))
            ->groupBy('produtos.id', 'produtos.nome')
            ->orderByDesc('valor')
            ->limit(10)
            ->get();

        return response()->json($result);
    }

    public function getBestSellingCategories()
    {
        $result = $this->estoqueModel
            ->join('produtos', 'estoque.idproduto', '=', 'produtos.id')
            ->join('categorias', 'produtos.idcategoria', '=', 'categorias.id')
            ->select('categorias.id as categoria_id', 'categorias.nome as categoria_nome', DB::raw('SUM(produtos.preco_venda * estoque.qtd_estoque) as valor_total_vendas'))
            ->where('estoque.tipo_operacao', 'saída')
            ->where('estoque.data', '>=', DB::raw("CURRENT_DATE - INTERVAL '6 months'"))
            ->groupBy('categorias.id', 'categorias.nome')
            ->orderByDesc('valor_total_vendas')
            ->get();

        return response()->json($result);
    }

    public function getBestCategorias()
    {
        $result = $this->estoqueModel
            ->join('produtos', 'estoque.idproduto', '=', 'produtos.id')
            ->join('categorias', 'produtos.idcategoria', '=', 'categorias.id')
            ->select('categorias.id as categoria_id', 'categorias.nome as categoria_nome', DB::raw('COUNT(estoque.id) as total_vendas'))
            ->where('estoque.tipo_operacao', 'saída')
            ->where('estoque.data', '>=', DB::raw("CURRENT_DATE - INTERVAL '6 months'"))
            ->groupBy('categorias.id', 'categorias.nome')
            ->orderByDesc('total_vendas')
            ->get();

        return response()->json($result);
    }
}
