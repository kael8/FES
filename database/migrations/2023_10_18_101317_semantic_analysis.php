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
        Schema::create('semantic_analysis', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_id');
            $table->string('academic_year');
            $table->string('semester');
            $table->string('A');
            $table->string('B');
            $table->string('C');
            $table->string('D');
            $table->string('positive');
            $table->string('negative');
            $table->string('respondents');
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
