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
            $table->string('academic_year_semester');
            $table->timestamps();
        });

        // Create the evaluation_responses table
        Schema::create('evaluation_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evaluation_record_id');
            $table->foreign('evaluation_record_id')->references('id')->on('evaluation_records');
            $table->string('question'); // or question_id if you have a separate questions table
            $table->string('response');
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
