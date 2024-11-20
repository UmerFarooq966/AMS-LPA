<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('university_name')->default('LPA');
            $table->integer('admission_year')->default(date('Y'));
            $table->string('course_code');
            $table->string('r_id')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('student_picture')->nullable();
            $table->string('gender');
            $table->string('passport_number');
            $table->string('nationality');
            $table->string('country');
            $table->string('city');
            $table->string('embassy');
            $table->date('date_of_birth');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('bank_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // Adds the deleted_at column for soft deletes
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
