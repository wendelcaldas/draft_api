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
            $table->string('rota1')->nullable();
            $table->string('rota2')->nullable();
            $table->string('forte1')->nullable();
            $table->string('forte2')->nullable();
            $table->string('forte3')->nullable();
            $table->string('fraco1')->nullable();
            $table->string('fraco2')->nullable();
            $table->string('fraco3')->nullable();
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
