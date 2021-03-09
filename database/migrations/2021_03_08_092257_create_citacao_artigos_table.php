<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitacaoArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citacao_artigos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artigo_id');
            $table->string('capitulo')->nullable();
            $table->text('citacao');
            $table->string('pagina');
            $table->string('paragrafo')->nullable();
            $table->string('tags');
            $table->text('comentario')->nullable();
            $table->timestamps();

            $table->foreign('artigo_id')->references('id')->on('artigos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citacao_artigos');
    }
}
