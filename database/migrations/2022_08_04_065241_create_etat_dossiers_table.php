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
        Schema::create('etat_dossiers', function (Blueprint $table) {
            $table->increments('id_etat_dosiier');

            $table->integer('id_usager')->unsigned()->nullable();
            $table->foreign('id_usager')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');

            $table->integer('id_arriver')->unsigned()->nullable();
            $table->foreign('id_arriver')
                    ->references('id_arriver')
                    ->on('arrivers')->onDelete('cascade');

            $table->integer('id_depart')->unsigned()->nullable();
            $table->foreign('id_depart')
                    ->references('id_depart')
                    ->on('departs')->onDelete('cascade');
            
            $table->integer('id_transmission')->unsigned()->nullable();
            $table->foreign('id_transmission')
                    ->references('id_transmission')
                    ->on('transmissions')->onDelete('cascade');
            
            $table->integer('id_personnel')->unsigned()->nullable();
            $table->foreign('id_personnel')
                    ->references('id_personnel')
                    ->on('personnels')->onDelete('cascade');
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
