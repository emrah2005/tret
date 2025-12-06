<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->text('brief')->nullable();
            $table->decimal('budget', 12, 2)->default(0);
            $table->string('currency', 10)->default('EUR');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['draft','published','closed'])->default('draft');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('campaigns');
    }
};
