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
        Schema::table('info_nutricionais', function (Blueprint $table) {
            $table->foreign(['idproduto'], 'fk_infn_idproduto')->references(['id'])->on('produtos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info_nutricionais', function (Blueprint $table) {
            $table->dropForeign('fk_infn_idproduto');
        });
    }
};
