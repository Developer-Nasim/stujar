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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',512);
            $table->string('slug',600)->unique();
            $table->string('designation',128)->nullable();
            $table->string('profilePhoto',512)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('created_by');
            $table->string('contact',64)->nullable();
            $table->string('email',64)->nullable();
            $table->string('website',64)->nullable();
            $table->smallInteger('bloodGroup', false, true)->length(1)->nullable();
            $table->string('socialMedia',1024)->nullable();
            $table->text('about')->nullable();
            $table->smallInteger('status', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
