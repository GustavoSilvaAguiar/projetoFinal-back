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
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->foreign(['idcontato'], 'fk_fcr_contato')->references(['id'])->on('contatos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idusuario'], 'fk_fcr_idusuario')->references(['id'])->on('usuarios')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropForeign('fk_fcr_contato');
            $table->dropForeign('fk_fcr_idusuario');
        });
    }
};
