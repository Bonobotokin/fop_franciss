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
        Schema::create('etat_dosiiers', function (Blueprint $table) {
            $table->increments('id_etat_dosiier');

            $table->integer('id_usager')->unsigned();
            $table->foreign('id_usager')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');
            
            $table->integer('id_arriver')->unsigned();
            $table->foreign('id_arriver')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');

            $table->integer('id_depart')->unsigned();
            $table->foreign('id_depart')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');
            
            $table->integer('id_transmission')->unsigned();
            $table->foreign('id_transmission')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');
            
            $table->integer('id_personnel')->unsigned();
            $table->foreign('id_personnel')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');
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
        Schema::dropIfExists('etat_dosiiers');
    }
};
