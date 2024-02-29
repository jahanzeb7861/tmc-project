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
        Schema::create('header_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_description');
            $table->longText('description');
            $table->string('image');
            $table->string('category');
            $table->string('keywords');
            $table->string('language', 50);
            $table->integer('user_id');
            $table->enum('is_publish', ['archive', 'publish'])->default('publish');
            $table->string('publish_date', 50);
            $table->string('menu_type', 50);
            $table->string('click_hits', 50)->default(0);
            $table->string('sort', 50)->default(rand(1,300));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_pages');
    }
};
