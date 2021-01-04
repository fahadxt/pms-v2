<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');

            $table->boolean('completed')->default(false);
            
            // $table->integer('assigned_to')->unsigned()->nullable();
            $table->foreignId('assigned_to')->references('id')->on('users')->onDelete('cascade')->nullable();


            // $table->unsignedInteger('created_by');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->date('due_on');
            $table->string('taskable_type')->comment('projects');
            $table->integer('taskable_id')->unsigned();

            $table->integer('status_id')->unsigned()->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
