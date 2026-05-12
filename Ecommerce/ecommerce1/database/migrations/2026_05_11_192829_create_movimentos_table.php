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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table-> foreignId('produto_id')->constraint() ->casacdeonDelete();
            //migrations que cria uma foreing key com comportamento automaticode exclusao em casacata
            //Exclusão em cascata: se um registro da tabela produtos for excluido, todos
            //os registros da tabela atual que referenciam esse produto_id tambem serão
            //apagados automaticamente
            $table->integer('quantidade');
            $table->enum('tipo', ['entrada', 'saida']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentos');
    }
};
