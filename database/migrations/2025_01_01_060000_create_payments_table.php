<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->nullable()->constrained('campaigns')->onDelete('set null');
            $table->foreignId('brand_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('influencer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->decimal('amount',12,2);
            $table->string('provider')->nullable();
            $table->string('status')->default('initiated');
            $table->string('escrow_id')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('payments');
    }
};
