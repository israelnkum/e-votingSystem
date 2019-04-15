<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_name')->nullable();
            $table->string('mode_of_study');
            $table->string('vision');
            $table->string('date_of_birth');
            $table->string('home_town');
            $table->string('region');
            $table->string('nationality');
            $table->string('home_address');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->integer('level_id');
            $table->integer('department_id');
            $table->string('index_number');
            $table->decimal('cgpa');
            $table->integer('voting_id');
            $table->integer('position_id');
            $table->string('position_held')->nullable();
            $table->integer('candidate')->default(0);
            $table->integer('position_number');
            $table->string('image');
            $table->string('added_by');
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
        Schema::dropIfExists('nominees');
    }
}
