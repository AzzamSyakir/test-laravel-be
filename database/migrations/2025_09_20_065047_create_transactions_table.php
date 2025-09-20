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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->uuid('appoinment_id');


            $table->decimal('total_amount', 10, 2);
            $table->enum('status', [
                'unpaid',
                'paid',
                'cancelled'
            ])->default('unpaid');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('appoinment_id')->references('id')->on('appointments');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
