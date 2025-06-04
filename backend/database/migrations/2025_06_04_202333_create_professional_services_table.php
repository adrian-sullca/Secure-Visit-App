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
        Schema::create('professional_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entry_exit_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('service_id');
            $table->string('task');
            $table->timestamps();
            $table->foreign('entry_exit_id')->references('id')->on('entry_exits')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('professional_id')->references('id')->on('professional_visits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_services');
    }
};
