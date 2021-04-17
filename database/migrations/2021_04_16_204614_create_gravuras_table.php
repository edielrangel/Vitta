<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGravurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gravuras', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->nullable();
            $table->string('artista');
            $table->string('tipo_gravura');
            $table->char('cor', 20);
            $table->string('estado');
            $table->char('tiragem', 10);
            $table->char('ano_aquisicao', 4);
            $table->decimal('valor', 10,2)->nullable();
            $table->boolean('acid');
            $table->string('imagem')->nullable();
            $table->string('tumbnail')->nullable();
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
        Schema::dropIfExists('gravuras');
    }
}
