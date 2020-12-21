<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTagIdArticleToArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_tag', function (Blueprint $table) {
            // 
            $table->BigInteger('id_tag')->unsigned();
            $table->foreign('id_tag')->references('id_tag')->on('tags')->onCascade('delete');
            
            $table->foreign('id_article')->references('id_article')->on('articles')->onCascade('delete');
            $table->BigInteger('id_article')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_tag', function (Blueprint $table) {
            //
        });
    }
}
