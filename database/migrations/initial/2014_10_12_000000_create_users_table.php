<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email','50')->unique();
            $table->string('first_name','155')->nullable();
            $table->string('last_name','155')->nullable();
            $table->integer('timezone_id')->unsigned();
            $table->boolean('is_active')->default('1');
            $table->text('tags')->nullable();
            $table->string('calendar_url','255')->nullable();
            $table->integer('avatar')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('created_at');
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();

            $table->foreign('timezone_id')->references('id')->on('timezones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
