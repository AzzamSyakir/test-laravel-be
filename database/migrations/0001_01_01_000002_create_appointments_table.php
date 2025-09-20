<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->timestamp('rescheduled_at')->nullable();
            $table->enum('status', [
                'pending',
                'confirmed',
                'progress',
                'completed',
                'cancelled',
            ])->default('pending');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
