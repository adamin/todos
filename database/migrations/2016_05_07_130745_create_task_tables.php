<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->default('');
            $table->string('name')->default('');
            $table->text('description')->default('');
            $table->enum('status', array('new', 'inprogress', 'completed'))->default('new');	
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('notes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->default('');
            $table->integer('task_id')->unsigned()->default(0);
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->default(0);
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->default('');
            $table->string('content')->default('');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('notes');
        Schema::drop('tasks');
    }

}
