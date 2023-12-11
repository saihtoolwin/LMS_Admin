<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->date('dob');
            $table->string('nrc');
            $table->string('phone');
            $table->string('city');
            $table->unsignedBigInteger('academicyear_id');
            $table->string('father_name');
            $table->string('father_nrc');
            $table->string('father_email');
            $table->string('father_phone');
            $table->string('father_address');
            $table->string('father_city');
            $table->string('mother_name');
            $table->string('mother_nrc');
            $table->string('mother_email');
            $table->string('mother_phone');
            $table->string('mother_address');
            $table->string('mother_city');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
