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
        Schema::create('animes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('title_english')->nullable();
            $table->string('title_romaji')->nullable();
            $table->integer('average_score')->nullable();
            $table->string('favourites')->nullable();
            $table->integer('episodes')->nullable();
            $table->string('status')->nullable();
            $table->string('genres')->default('[]')->nullable();
            $table->boolean('is_adult')->nullable();
            $table->text('description')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animes');
    }
};
