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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_level');
            $table->string('course_name');
            $table->string('final_qualification');
            $table->integer('hours_per_week');
            $table->string('status');
            $table->date('commencement_date');
            $table->string('course_duration');
            $table->date('course_completion_date');
            $table->decimal('tuition_fee', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
