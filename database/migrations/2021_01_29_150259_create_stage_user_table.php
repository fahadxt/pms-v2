<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stage_user', function (Blueprint $table) {
            // $table->increments('id');


            // $table->integer('stage_id')->unsigned();
            $table->foreignId('stage_id')->references('id')->on('stages')->onDelete('cascade');

            // $table->integer('user_id')->unsigned();
            $table->foreignId('user_id');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stage_user');
    }
}
