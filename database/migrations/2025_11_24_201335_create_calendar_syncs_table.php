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
        Schema::create('calendar_syncs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['ical', 'google'])->default('ical');
            $table->string('name')->nullable();
            $table->text('feed_url')->nullable();
            $table->string('external_calendar_id')->nullable();
            $table->timestamp('last_sync_at')->nullable();
            $table->enum('sync_status', ['active', 'paused', 'failed'])->default('active');
            $table->text('last_error')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['unit_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar_syncs');
    }
};
