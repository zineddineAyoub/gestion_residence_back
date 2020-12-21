<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamationStatesReclamationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamation_states_reclamations', function (Blueprint $table) {
            $table->bigIncrements('id_reclamation_states_reclamations');
           

            $table->BigInteger('id_reclamation')->unsigned();
            $table->foreign('id_reclamation')->references('id_reclamation')->on('reclamations')->onCascade('delete');
            
            $table->BigInteger('id_reclamation_state')->unsigned();
            $table->foreign('id_reclamation_state')->references('id_reclamation_state')->on('reclamation_states')->onCascade('delete');
            

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
        Schema::dropIfExists('reclamation_states_reclamations');
    }
}
