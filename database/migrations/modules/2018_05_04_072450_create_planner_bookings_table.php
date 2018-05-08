<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlannerBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planner_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->integer('resource_id')->unsigned();
            $table->string('day','155');
            $table->integer('duration');
            $table->boolean('sequence');
            $table->boolean('tentative');
            $table->string('on_site');
            $table->string('start_time','155');
            $table->text('comments');
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();


            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('resource_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planner_bookings');
    }
}
