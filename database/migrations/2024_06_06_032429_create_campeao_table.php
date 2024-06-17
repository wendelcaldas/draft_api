<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampeaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campeao', function (Blueprint $table) {
            $table->id(); // Coluna 'id' auto-incrementada
            $table->string('id_champ');  // Define 'id_champ' como a chave primária
            $table->string('nome');
            $table->string('classe');
            $table->string('rota1');
            $table->string('rota2');
            $table->string('poke');
            $table->string('pickoff');
            $table->string('engage');
            $table->string('protect');
            $table->string('split');
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
        Schema::dropIfExists('campeao');
    }
}
