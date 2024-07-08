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
        Schema::create('info_nutricionais', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('porcao');
            $table->string('unidade_medida', 10);
            $table->string('alergenicos', 70)->nullable();
            $table->string('ingredientes', 70);
            $table->decimal('calorias', 10, 4);
            $table->decimal('gorduras', 10, 4);
            $table->decimal('carboidratos', 10, 4);
            $table->decimal('proteinas', 10, 4);
            $table->integer('idproduto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_nutricionais');
    }
};
