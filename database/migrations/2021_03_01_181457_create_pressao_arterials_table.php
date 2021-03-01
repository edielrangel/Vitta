<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressaoArterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pressao_arterials', function (Blueprint $table) {
            $table->id();
            $table->date('dataAfericao');
            $table->string('localAfericao')->nullable();
            $table->string('observacao')->nullable();
            $table->int('pas')->comment('Refere-se a Alta (Sistólica)');
            $table->int('pad')->comment('Refere-se a Baixa (diastólica)');
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
        Schema::dropIfExists('pressao_arterials');
    }
}
