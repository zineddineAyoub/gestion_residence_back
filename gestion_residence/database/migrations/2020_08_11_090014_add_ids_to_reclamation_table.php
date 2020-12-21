<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdsToReclamationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclamations', function (Blueprint $table) {

            $table->unsignedBigInteger('id_reclaimer');
            $table->foreign('id_reclaimer')->references('id_reclaimer')->on('reclaimers')->onCascade('delete');
           
            $table->unsignedBigInteger('id_reclamation_type');
            $table->foreign('id_reclamation_type')->references('id_reclamation_type')->on('reclamation_types')->onCascade('delete');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclamations', function (Blueprint $table) {
            //
        });
    }
}
