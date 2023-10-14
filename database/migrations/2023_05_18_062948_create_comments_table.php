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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('content_id')->nullable();
            $table->foreignId('parent')->nullable();
            $table->foreignId('commentable_id')->nullable();
            $table->string('commentable_type',64)->nullable();
            $table->string('name',64)->nullable();
            $table->string('email',64)->nullable();
            $table->string('phone',32)->nullable();
            $table->mediumText('description')->nullable();
            $table->smallInteger('status', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
