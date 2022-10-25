<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->constrained();
            $table->unsignedBigInteger('user_id')->constrained();
            // add time stamp when project assign to user
            $table->timestamps();
            // define manager of the project
            $table->boolean('is_manager')->default(false);

            $table->foreignId('manager_id')->references('id')->on('users');

            
            // $table->integer('product_id')->unsigned();
            // $table->foreign('product_id')->references('id')->on('projec');

            // $table->integer('user_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
    }
}
