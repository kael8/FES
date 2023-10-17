<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the evaluation_records table
        Schema::create('evaluation_records', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('faculty_id');
            $table->string('academic_year');
            $table->string('semester');
            $table->integer('A');
            $table->integer('B');
            $table->integer('C');
            $table->integer('D');
            $table->text('comment');
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
        //
    }
};
