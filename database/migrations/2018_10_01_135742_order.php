<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->datetime('paid_date')->nullable();
            $table->unsignedInteger('fk_status_id');
            $table->foreign('fk_status_id')->references('id')->on('order_status');
            $table->string('name', 60);
            $table->string('fsname', 60);
            $table->string('address', 100);
            $table->string('npa', 6);
            $table->string('city', 40);
            $table->string('email', 60);
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
