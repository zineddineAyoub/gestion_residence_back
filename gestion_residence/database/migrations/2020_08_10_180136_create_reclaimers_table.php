<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclaimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclaimers', function (Blueprint $table) {
            $table->bigIncrements('id_reclaimer');
            $table->string('first_name_reclaimer');
            $table->string('last_name_reclaimer');
            $table->string('phone_number_reclaimer');
            $table->string('address_reclaimer');
            $table->string('email_reclaimer')->unique();
            $table->double('longitude');
            $table->double('latitude');
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
        Schema::dropIfExists('reclaimers');
    }
}
