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
        Schema::create('website_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('logo');
            $table->string('favicon');
            $table->string('author')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('website_address')->nullable();
            $table->string('keywords')->nullable();
            $table->string('facebook_link',100)->nullable();
            $table->string('twitter_link',100)->nullable();
            $table->string('instagram_link',100)->nullable();
            $table->string('linkedin_link',100)->nullable();
            $table->string('youtube_link',100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
