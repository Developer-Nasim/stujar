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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        //slider table
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('url')->nullable();
            $table->int('status')->default(1);
            $table->timestamps();
        });
        //welcome section table
        Schema::create('welcomes', function (Blueprint $table) {
            $table->id();
            $table->string('text_one');
            $table->string('text_two');
            $table->int('status')->default(1);
            $table->timestamps();
        });
        //member count section table
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('total_member');
            $table->string('total_member_text');
            $table->string('central_member');
            $table->string('central_member_text');
            $table->string('branch_member');
            $table->string('branch_member_text');
            $table->int('status')->default(1);
            $table->timestamps();
        });
        //notice section table
        Schema::create('notice', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('image');
            $table->string('description'); //text editor
            $table->int('status')->default(1);
            $table->timestamps();
        });
        //Committee section table
        Schema::create('Committee', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('image');
            $table->int('status')->default(1);
            $table->timestamps();
        });
        //page table
        Schema::create('page_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->int('status')->default(1);
            $table->timestamps();
        });
        Schema::create('page', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_category_id');
            $table->string('title');
            $table->string('slug');
            $table->string('description');
            $table->int('status')->default(1);
            $table->timestamps();
        });

        //event section table
        Schema::create('event', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug');
        $table->string('image');
        $table->string('description'); //text editor
        $table->int('status')->default(1);
        $table->timestamps();
       });
        //Image Gallery table
        Schema::create('image', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('type');
        $table->string('image');
        $table->timestamps();
       });
        //Member form table
        Schema::create('image', function (Blueprint $table) {
        $table->id();
        $table->string('company_name');
        $table->string('email');
        $table->string('mobile');
        $table->string('password');
        $table->timestamps();
       });
        //post table
        Schema::create('image', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id');
        $table->string('title');
        $table->string('slug');
        $table->string('meta_title');
        $table->string('meta_description');
        $table->string('keywords');
        $table->string('description');
        $table->string('video');
        $table->string('image');
        $table->int('status')->default(1);
        $table->timestamps();
       });
        //post comment   table
        Schema::create('image', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id');
        $table->string('name');
        $table->string('email');
        $table->string('comment');
        $table->timestamps();
       });
        //tag comment   table
        Schema::create('tag', function (Blueprint $table) {
        $table->id();
        $table->foreignId('name');
        $table->string('slug');
        $table->int('status')->default(1);
        $table->timestamps();
       });
        //posts tag table
        Schema::create('post_tag', function (Blueprint $table) {
        $table->id();
        $table->foreignId('post_id');
        $table->foreignId('tag_id');
        $table->timestamps();
       });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
