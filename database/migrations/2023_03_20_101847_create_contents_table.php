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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('content_type',16);
            $table->foreignId('user_id');
            $table->foreignId('member_id');
            $table->string('name',512);
            $table->string('subtitle',512)->nullable();
            $table->string('slug',600)->unique();
            $table->text('details')->nullable();
            $table->string('summary',1024)->nullable();
            $table->string('note',1024)->nullable();
            $table->string('barcode',2048)->nullable();

            $table->string('meta_heading',256)->nullable();
            $table->string('meta_title',256)->nullable();
            $table->string('meta_keywords',256)->nullable();
            $table->string('meta_description',256)->nullable();
            $table->string('meta_canonical',128)->nullable();
            $table->string('meta_robots',128)->nullable();
            $table->string('meta_image',128)->nullable();

            $table->smallInteger('status', false, true)->length(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
