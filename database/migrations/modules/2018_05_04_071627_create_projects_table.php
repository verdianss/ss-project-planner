<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('planner_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('manager_id')->unsigned();
            $table->string('name','150');
            $table->string('code','30');
            $table->boolean('is_active');
            $table->string('kind','255');
            $table->string('color','255');
            $table->integer('estimated');
            $table->text('notes');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('booked_duration');
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();

            $table->foreign('planner_id')->references('id')->on('planners');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('manager_id')->references('id')->on('users');
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
