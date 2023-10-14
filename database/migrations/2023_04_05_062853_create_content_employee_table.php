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
        Schema::create('content_employee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id');
            $table->foreignId('employee_id');
            $table->smallInteger('post', false, true)->length(1)->nullable();
            $table->smallInteger('sequence', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_employee');
    }
};
