<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('family_visits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visit_id');
            $table->string('student_name');
            $table->string('student_surname');
            $table->string('student_course');
            $table->unsignedBigInteger('motive_id');
            $table->string('custom_motive')->nullable();
            $table->timestamps();
            $table->foreign('visit_id')->references('id')->on('visits')->onDelete('cascade');
            $table->foreign('motive_id')->references('id')->on('motives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_visits');
    }
};
