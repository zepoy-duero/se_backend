<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProspectusesTable extends Migration
{
    public function up()
    {
        Schema::create('student_prospectuses', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('student_id')->constrained('students');
            $table->foreignId('prospectus_id')->constrained('program_prospectus');
            $table->date('enrollment_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_prospectuses');
    }
}
