<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('myclass_id');
            $table->unsignedBigInteger('quiz_id');
            $table->date('deadline');
            $table->timestamps();
            $table->foreign('myclass_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_quizzes');
    }
}
