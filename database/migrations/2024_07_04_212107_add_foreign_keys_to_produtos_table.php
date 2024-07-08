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
        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign(['idcategoria'], 'fk_prd_idcategoria')->references(['id'])->on('categorias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idusuario'], 'fk_prd_idusuario')->references(['id'])->on('usuarios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idmarca'], 'fr_prd_idmarca')->references(['id'])->on('marcas')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('fk_prd_idcategoria');
            $table->dropForeign('fk_prd_idusuario');
            $table->dropForeign('fr_prd_idmarca');
        });
    }
};
