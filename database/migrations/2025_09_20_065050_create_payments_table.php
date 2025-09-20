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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaction_id');
            $table->decimal('amount', 10, 2);
            $table->enum('method', [
                'card',
                'qris',
                'debit',
                'indomaret',
                'alfamart',
            ]);
            $table->enum('status', [
                'authorize',
                'capture',
                'settlement',
                'deny',
                'pending',
                'cancel',
                'refund',
                'partial_refund',
                'chargeback',
                'partial_chargeback',
                'expire',
                'failure'
            ])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
