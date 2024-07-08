<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /* Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 70);
            $table->text('descricao');
            $table->date('data_cadastro')->nullable()->default('CURRENT_DATE');
            $table->string('und_medida', 15);
            $table->decimal('preco_custo', 10);
            $table->decimal('preco_venda', 10);
            $table->integer('idusuario');
            $table->integer('idcategoria');
            $table->integer('idmarca');
        }); */

        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 70);
            $table->text('descricao');
            $table->date('data_cadastro')->nullable()->default(DB::raw('CURRENT_DATE'));
            $table->string('und_medida', 15);
            $table->decimal('preco_custo', 10, 2);
            $table->decimal('preco_venda', 10, 2);
            $table->integer('idusuario');
            $table->integer('idcategoria');
            $table->integer('idmarca');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
