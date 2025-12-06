<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('influencer_id')->constrained('users')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->text('file_url')->nullable();
            $table->date('due_at')->nullable();
            $table->enum('status',['pending','submitted','approved','rejected'])->default('pending');
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('deliverables');
    }
};
