<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->longText('description');

            // $table->integer('owner_id')->unsigned()->comment('user id of the owner of the project');
            $table->foreignId('owner_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('status_id')->unsigned()->nullable()->default(1);
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');


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
        Schema::dropIfExists('projects');
    }
}
