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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone')->nullable();
            $table->integer('num_guests');
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('status', ['pending', 'confirmed', 'checked_in', 'checked_out'])->default('pending');
            $table->enum('source', ['direct', 'ical', 'google'])->default('direct');
            $table->string('external_id')->nullable()->unique();
            $table->decimal('total_price', 10, 2);
            $table->json('guest_data')->nullable();
            $table->timestamps();

            // CRITICAL indexes for conflict detection and calendar queries
            $table->index(['unit_id', 'check_in', 'check_out']);
            $table->index(['status', 'check_in']);
            $table->index('external_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
