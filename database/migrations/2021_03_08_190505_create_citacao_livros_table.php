<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitacaoLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citacao_livros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('livro_id');
            $table->string('capitulo')->nullable();
            $table->text('citacao');
            $table->string('pagina');
            $table->string('paragrafo')->nullable();
            $table->string('tags');
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('livro_id')->references('id')->on('livros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citacao_livros');
    }
}
