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
        Schema::create('departs', function (Blueprint $table) {
            $table->increments('id_depart');
            $table->integer('numero_depart');

            $table->integer('destinateur_depart')->unsigned();
            $table->foreign('destinateur_depart')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');

            $table->integer('objet_depart');
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
        Schema::dropIfExists('departs');
    }
};
