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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name',512);
            $table->foreignId('user_id');
            $table->foreignId('member_id');
            $table->foreignId('created_by');
            $table->string('openHours',256);
            $table->string('address',512);
            $table->string('mapLink',512);
            $table->string('contacts',512);
            $table->smallInteger('status', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
