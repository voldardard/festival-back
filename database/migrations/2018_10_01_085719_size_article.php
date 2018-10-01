<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SizeArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_size_article', function (Blueprint $table) {
            $table->unsignedInteger('size_id');
            $table->foreign('size_id')->references('id')->on('article_size');
            $table->unsignedInteger('article_id');
            $table->foreign('article_id')->references('id')->on('article');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
