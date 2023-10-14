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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('tag_type', false, true)->length(3)->nullable();
            $table->foreignId('user_id');
            $table->foreignId('parent')->nullable();
            $table->string('title',512);
            $table->string('linkto',512)->nullable();
            $table->string('linkUrl',512)->nullable();
            $table->smallInteger('sequence', false, true)->length(3)->nullable();
            $table->smallInteger('status', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
