<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('estoque', function (Blueprint $table) {
            $table->foreign(['idfornecedor'], 'fk_est_idfornecedor')->references(['id'])->on('fornecedores')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idproduto'], 'fk_est_idproduto')->references(['id'])->on('produtos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idusuario'], 'fr_est_idusuario')->references(['id'])->on('usuarios')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('estoque', function (Blueprint $table) {
            $table->dropForeign('fk_est_idfornecedor');
            $table->dropForeign('fk_est_idproduto');
            $table->dropForeign('fr_est_idusuario');
        });
    }
};
