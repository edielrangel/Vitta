<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autor_artigos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artigo_id');
            $table->unsignedBigInteger('autor_id');
            $table->timestamps();

            $table->foreign('artigo_id')->references('id')->on('artigos');
            $table->foreign('autor_id')->references('id')->on('autors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_artigos');
    }
}
