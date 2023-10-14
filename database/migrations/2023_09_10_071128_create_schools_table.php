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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name',512);
            $table->integer('user_id')->nullable();
            $table->string('slug')->unique();
            $table->string('file')->nullable();
            $table->string('eiin',255)->nullable();
            $table->string('established',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('address',512)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
