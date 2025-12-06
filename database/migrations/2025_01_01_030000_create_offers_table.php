<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('influencer_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount',12,2)->default(0);
            $table->enum('status',['pending','accepted','rejected','cancelled'])->default('pending');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('offers');
    }
};
