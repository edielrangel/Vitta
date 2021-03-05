<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('editora_id');
            $table->string('titulo');
            $table->integer('tipo_autor');
            $table->string('subtitulo')->nullable();
            $table->string('edicao');
            $table->string('cidade');
            $table->string('ano');
            $table->string('notas')->nullable();
            $table->string('paginas')->nullable();
            $table->string('volume')->nullable();
            $table->string('isbn')->nullable();
            $table->string('cdd')->nullable();
            $table->string('cdu')->nullable();
            $table->string('categoria')->nullable();
            $table->timestamps();

            $table->foreign('editora_id')->references('id')->on('editoras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('livros');
    }
}
