<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToReclaimersColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reclaimers', function (Blueprint $table) {
            $table->string('address_reclaimer')->nullable($value=true)->change();
            $table->string('phone_number_reclaimer')->nullable($value=true)->change();
            
            $table->string('email_reclaimer')->nullable($value=true)->change();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reclaimers_cols', function (Blueprint $table) {
            //
        });
    }
}
