<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->string('name', 255);
            $table->longText('description');
            $table->double('price');
            $table->unsignedInteger('fk_article_category_id');
            $table->foreign('fk_article_category_id')->references('id')->on('article_category');
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
