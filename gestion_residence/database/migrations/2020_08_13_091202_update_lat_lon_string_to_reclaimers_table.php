<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLatLonStringToReclaimersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclaimers', function (Blueprint $table) {
            $table->string('longitude')->nullable($value=true)->change();
            $table->string('latitude')->nullable($value=true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclaimers', function (Blueprint $table) {
            //
        });
    }
}
