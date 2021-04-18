<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsculturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esculturas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('artista');
            $table->string('material');
            $table->string('estado');
            $table->integer('altura');
            $table->integer('largura');
            $table->integer('profundidade');
            $table->decimal('peso', 10, 3)->nullable();
            $table->char('ano_aquisicao', 4);
            $table->decimal('valor', 10,2)->nullable();
            $table->string('imagem')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esculturas');
    }
}
