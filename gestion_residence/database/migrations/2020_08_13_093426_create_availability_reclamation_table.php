<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailabilityReclamationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('availability_reclamation', function (Blueprint $table) {
            $table->bigIncrements('id_availability_reclamation');

            $table->unsignedBigInteger('id_availability');
            $table->foreign('id_availability')->references('id_availability')->on('availabilities')->onCascade('delete');
           
            $table->unsignedBigInteger('id_reclamation');
            $table->foreign('id_reclamation')->references('id_reclamation')->on('reclamations')->onCascade('delete');
           
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
        Schema::dropIfExists('availability_reclamation');
    }
}
