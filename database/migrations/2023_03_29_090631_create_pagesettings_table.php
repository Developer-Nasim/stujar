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
        Schema::create('pagesettings', function (Blueprint $table) {
            $table->id();
            $table->string('meta_slug',32)->unique();
            $table->string('meta_heading',512)->nullable();
            $table->string('meta_title',512)->nullable();
            $table->string('meta_keyword',512)->nullable();
            $table->string('meta_description',512)->nullable();
            $table->mediumText('page_description')->nullable();
            $table->string('meta_image',512)->nullable();
            $table->string('meta_robots',16)->nullable();
            $table->string('meta_canonical',512)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagesettings');
    }
};
