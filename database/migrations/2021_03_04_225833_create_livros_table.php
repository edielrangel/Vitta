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
            $table->string('notas')->nullable()->comment('Tradução, etc');
            $table->string('paginas')->nullable();
            $table->string('volume')->nullable();
            $table->string('isbn')->nullable();
            $table->string('cdd')->nullable();
            $table->string('cdu')->nullable();
            $table->string('categoria')->nullable();
            $table->text('descricao')->nullable();
            $table->boolean('fisico')->default(true)->comment('Refere-se se é um livro físico ou eBook');
            $table->decimal('preco', 10,2)->default('0.00');
            $table->string('origem')->comment('1 - Aquisição; 2 - Presente; 3 - Outros');
            $table->date('dtAquisicao');
            $table->text('observacao')->nullable();
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
