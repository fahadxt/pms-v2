<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->foreignId('admin_id')->nullable();
            $table->integer('sort')->nullable();
            $table->morphs('stageable');

            $table->date('stages_due_on');


            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();

            $table->integer('status_id')->unsigned()->nullable();
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');

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
        Schema::dropIfExists('stages');
    }
}
