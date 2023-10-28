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
        Schema::create('pending_eval', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('faculty_id');
            $table->integer('college_id');
            $table->integer('department_id'); // You can adjust the column type as needed
            $table->integer('program_id');
            $table->string('academic_year');
            $table->string('semester');
            $table->integer('A1');
            $table->integer('A2');
            $table->integer('A3');
            $table->integer('A4');
            $table->integer('A5');
            $table->integer('B1');
            $table->integer('B2');
            $table->integer('B3');
            $table->integer('B4');
            $table->integer('B5');
            $table->integer('C1');
            $table->integer('C2');
            $table->integer('C3');
            $table->integer('C4');
            $table->integer('C5');
            $table->integer('D1');
            $table->integer('D2');
            $table->integer('D3');
            $table->integer('D4');
            $table->integer('D5');
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
