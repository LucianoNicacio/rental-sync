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
        Schema::create('message_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('trigger', [
                'booking_created',
                'booking_confirmed',
                'pre_checkin',
                'check_in_day',
                'check_out_day',
                'post_checkout'
            ]);
            $table->string('subject')->nullable();
            $table->text('body');
            $table->integer('send_offset_hours')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['team_id', 'trigger', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_templates');
    }
};
