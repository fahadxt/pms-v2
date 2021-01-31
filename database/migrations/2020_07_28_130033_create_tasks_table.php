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

            $table->date('due_on');
            $table->morphs('taskable');

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->boolean('completed')->default(false);

            $table->foreignId('assigned_to');
            $table->foreignId('created_by');
            $table->foreignId('updated_by')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
