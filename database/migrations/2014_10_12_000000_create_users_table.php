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
            $table->integer('department_id');
            $table->integer('voting_id');
            $table->integer('level_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('role');
            $table->integer('updated')->default(0);
            $table->integer('voted')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
