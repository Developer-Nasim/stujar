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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('content_id');
            $table->string('name');
            $table->string('caption')->nullable();
            $table->string('description')->nullable();
            $table->string('video')->nullable();;
            $table->string('file')->nullable();
            $table->string('url')->nullable();;
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
