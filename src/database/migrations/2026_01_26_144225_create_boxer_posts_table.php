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
        Schema::create('boxer_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('user_posts')
                ->cascadeOnDelete();
            $table->foreignId('gym_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->text('bio')->nullable();
            $table->integer('record_win')->default(0);
            $table->integer('record_lose')->default(0);
            $table->integer('record_draw')->default(0);
            $table->string('titles')->nullable();
            $table->string('sns_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxer_posts');
    }
};
