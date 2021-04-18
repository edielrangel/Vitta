<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuadrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quadros', function (Blueprint $table) {
            $table->id();
            $table->char('titulo', 100);
            $table->char('artista', 100);
            $table->char('tecnica', 50);
            $table->char('ano_aquisicao', 4);
            $table->decimal('valor', 10,2)->nullable();
            $table->char('medidas', 10);
            $table->string('imagem');
            $table->string('thumbnail');
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
        Schema::dropIfExists('quadros');
    }
}
