<?php

use App\Models\Anime;
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
        Schema::create('watchings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Anime::class)->constrained()->cascadeOnDelete();
            $table->integer('episodes_watched')->nullable();
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
        Schema::dropIfExists('watchings');
    }
};
