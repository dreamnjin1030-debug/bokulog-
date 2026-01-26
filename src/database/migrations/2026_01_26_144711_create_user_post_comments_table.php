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
        Schema::create('user_post_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('boxer_id')
                ->constrained('boxer_posts')
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('user_posts')
                ->cascadeOnDelete();
            $table->tinyInteger('rating'); // 1〜5
            $table->text('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_post_comments');
    }
};
