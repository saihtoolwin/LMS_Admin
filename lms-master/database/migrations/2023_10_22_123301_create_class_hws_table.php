<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassHwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_hws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('myclass_id');
            $table->unsignedBigInteger('assignment_id');
            $table->date('deadline');
            $table->timestamps();
            $table->foreign('myclass_id')->references('id')->on('my_classes')->onDelete('cascade');
            $table->foreign('assignment_id')->references('id')->on('assignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_hws');
    }
}
