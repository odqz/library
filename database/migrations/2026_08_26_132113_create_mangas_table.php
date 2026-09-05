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
        Schema::create('mangas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('title_english')->nullable();
            $table->string('title_romaji')->nullable();
            $table->integer('average_score')->nullable();
            $table->integer('favourites')->nullable();
            $table->integer('volumes')->nullable();
            $table->integer('chapters')->nullable();
            $table->string('status')->nullable();
            $table->string('genres')->nullable();
            $table->boolean('is_adult')->nullable();
            $table->text('description')->nullable();
            $table->string('countryOfOrigin')->nullable();
            $table->string('cover_image_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
