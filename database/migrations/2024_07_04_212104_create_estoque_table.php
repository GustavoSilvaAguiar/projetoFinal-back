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
        /* Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtd_estoque');
            $table->string('lcz_estoque', 70);
            $table->date('data')->nullable()->default(CURRENT_DATE);
            $table->integer('idproduto');
            $table->integer('idfornecedor')->nullable();
            $table->date('data_validade');
            $table->string('lote', 50);
            $table->enum('tipo_operacao', ['entrada', 'saída'])->nullable();
            $table->integer('idusuario');
            $table->string('observacao')->nullable();
        }); */

        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->integer('qtd_estoque');
            $table->string('lcz_estoque', 70);
            $table->date('data')->nullable()->default(DB::raw('CURRENT_DATE'));
            $table->integer('idproduto');
            $table->integer('idfornecedor')->nullable();
            $table->date('data_validade');
            $table->string('lote', 50);
            $table->enum('tipo_operacao', ['entrada', 'saída'])->nullable();
            $table->integer('idusuario');
            $table->string('observacao', 255)->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque');
    }
};
