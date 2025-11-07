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
    Schema::create('tickets', function (Blueprint $table) {
        $table->id();
        $table->string('type'); // e.g., Expo Visitor, General, Startup, Investor, VIP, Student
        $table->decimal('price', 10, 2)->nullable();
        $table->string('name')->nullable(); // purchaser name
        $table->string('email')->nullable();
        $table->string('status')->default('pending'); // pending, paid, cancelled
        $table->json('meta')->nullable();
        $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
