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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('memberId',16)->unique()->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('created_by')->nullable();
            $table->string('title',512);
            $table->string('subtitle',1024)->nullable();
            $table->string('slug',600)->unique();
            $table->date('memberSince')->nullable();
            $table->date('validTill',)->nullable();
            $table->string('logo',512)->nullable();
            $table->string('companyInfo',512)->nullable();
            $table->string('bcsMemberId',16)->nullable();
            $table->smallInteger('companyType',2)->nullable();
            $table->string('businessNature',64)->nullable();
            $table->string('businessAddress',256)->nullable();
            $table->smallInteger('establishYear',4)->nullable();
            $table->smallInteger('floorCentral',1)->nullable();
            $table->string('telephone',64)->nullable();
            $table->string('mobile',64)->nullable();
            $table->string('email',64)->nullable();
            $table->string('companyWebsite',64)->nullable();
            $table->mediumText('aboutCompany')->nullable();
            $table->string('googleMap',512)->nullable();
            $table->string('socialMedia',1024)->nullable();
            $table->string('status',10)->nullable();
            $table->string('metaTitle',512)->nullable();
            $table->string('metaKeywords',512)->nullable();
            $table->string('metaDescription',512)->nullable();
            $table->string('shareImage',512)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
