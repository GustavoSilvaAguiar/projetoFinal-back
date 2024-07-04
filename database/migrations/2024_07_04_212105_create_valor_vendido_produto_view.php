<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW \"valor_vendido_produto\" AS SELECT p.nome AS produto,
    sum(((e.qtd_estoque)::numeric * p.preco_venda)) AS valor
   FROM (estoque e
     LEFT JOIN produtos p ON ((e.idproduto = p.id)))
  WHERE ((e.tipo_operacao)::text = 'saída'::text)
  GROUP BY p.id;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"valor_vendido_produto\"");
    }
};
