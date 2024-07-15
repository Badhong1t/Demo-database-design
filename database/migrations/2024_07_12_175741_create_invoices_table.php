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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->decimal('total_amount',10,2);

            $table->decimal('paid_amount',10,2);

            $table->decimal('due_amount',10,2);

            $table->decimal('discount_amount',10,2);

            $table->decimal('vat',10,2);

            $table->unsignedBigInteger('customer_id');

            $table->foreign('customer_id')
                  ->references('id')->on('customers')
                  ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')
                  ->on('users')
                  ->cascadeOnUpdate()->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated_at')->useCurrent()
                  ->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
