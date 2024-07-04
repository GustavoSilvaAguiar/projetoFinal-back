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
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['idcontato'], 'fk_usr_contato')->references(['id'])->on('contatos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idendereco'], 'fk_usr_endereco')->references(['id'])->on('enderecos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('fk_usr_contato');
            $table->dropForeign('fk_usr_endereco');
        });
    }
};
