<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReqiuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqiuests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student');
            $table->integer('room');
            $table->string('desc_request');
            $table->integer('st_id')->unsigned();
            $table->foreign('st_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('yes_no');
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
        Schema::dropIfExists('reqiuests');
    }
}
