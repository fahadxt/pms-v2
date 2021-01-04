<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('path');
            $table->string('hash');
            $table->string('mime_type');

            $table->string('fileable_type');
            $table->integer('fileable_id')->unsigned();

            // $table->integer('owner_id')->unsigned()->comment('user id of the owner of the file');
            $table->foreignId('owner_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('files');
    }
}
