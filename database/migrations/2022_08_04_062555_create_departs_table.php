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

            $table->integer('id_usager')->unsigned();
            $table->foreign('id_usager')
                    ->references('id_usager')
                    ->on('usagers')->onDelete('cascade');

            $table->string('motif_depart', 100);
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
