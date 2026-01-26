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
        Schema::create('user_post_comments_like', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')
                ->constrained('user_post_comments')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('user_posts')
                ->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['review_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_post_comments_like');
    }
};
