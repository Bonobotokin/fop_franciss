<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivers', function (Blueprint $table) {
            $table->increments('id_arriver');
            $table->integer('numero_arriver');

            $table->integer('expediteur_arriver')->unsigned();
            $table->foreign('expediteur_arriver')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');

            $table->integer('objet_arriver');
            $table->integer('destinateur_arriver');
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
        Schema::dropIfExists('arrivers');
    }
};
