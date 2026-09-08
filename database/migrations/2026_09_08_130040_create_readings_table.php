<?php

use App\Models\Manga;
use App\Models\User;
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
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->foreignId(User::class)->constrained()->cascadeOnDelete();
            $table->foreignId(Manga::class)->constrained()->cascadeOnDelete();
            $table->integer('chapters_read')->nullable();
            $table->integer('volumes_read')->nullable();
            $table->string('status')->nullable(); // planned, reading, completed, dropped, paused
            $table->integer('rating')->nullable(); // raiting out of 10
            $table->text('review')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};
