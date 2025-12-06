<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            // influencer | business
            $table->enum('type', ['influencer', 'business']);

            // Flexible JSON data:
            // - niches            (array)
            // - platforms         (array)
            // - avg_reach         (number)
            // - engagement_rate   (number)
            // - audience data     (strings)
            // - business info     (for brands)
            $table->json('metrics')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
