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
        Schema::create('boxers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('gym_id')->constrained('gyms')->cascadeOnDelete();
            $table->unsignedInteger('win')->default(0);
            $table->unsignedInteger('lose')->default(0);
            $table->unsignedInteger('draw')->default(0);
            $table->string('titles')->nullable();
            $table->text('content')->nullable();
            $table->json('pictures')->nullable();
            $table->string('sns_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boxers');
    }
};
