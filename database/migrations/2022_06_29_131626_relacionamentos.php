<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->foreignId('tipo_veiculo_id')
                ->constrained('tipo_veiculos')
                ->onDelete('cascade');
        });

        Schema::table('veiculos', function (Blueprint $table) {
            $table->foreignId('tipo_veiculo_id')
                ->constrained('tipo_veiculos')
                ->onDelete('cascade');
        });

        Schema::table('estadias', function (Blueprint $table) {
            $table->foreignId('veiculo_id')
                ->constrained('veiculos')
                ->onDelete('cascade');
            $table->foreignId('preco_id')
                ->constrained('precos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vagas', function (Blueprint $table) {
            $table->dropForeign('tipo_veiculo_id');
        });

        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropForeign('tipo_veiculo_id');
        });

        Schema::table('estadias', function (Blueprint $table) {
            $table->dropForeign('veiculo_id');
            $table->dropForeign('preco_id');
        });
    }
};
