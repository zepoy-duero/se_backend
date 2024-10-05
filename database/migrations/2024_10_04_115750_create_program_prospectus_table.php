<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramProspectusTable extends Migration
{
    public function up()
    {
        Schema::create('program_prospectus', function (Blueprint $table) {
            $table->id('prospectus_id');
            $table->string('program_of_study', 100);
            $table->string('course_code', 50);
            $table->string('course_title', 255);
            $table->integer('no_of_hours_lec');
            $table->integer('no_of_hours_lab');
            $table->decimal('credit_units', 3, 1);
            $table->string('pre_requisites', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_prospectus');
    }
}
