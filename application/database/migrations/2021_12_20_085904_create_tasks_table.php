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
            $table->id();
            $table->string('title',255);
            $table->text('description');
            $table->unsignedSmallInteger('type');
            $table->unsignedSmallInteger('status');
            $table->date('start_date');
            $table->date('due_date');
            $table->unsignedBigInteger('assignee');
            $table->unsignedDecimal('estimate',8,1);
            $table->unsignedDecimal('actual',8,1);
            $table->timestamps();
            $table->foreign('assignee')->references('id')->on('users');
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
