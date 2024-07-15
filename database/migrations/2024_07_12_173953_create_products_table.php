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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name',50);

            $table->decimal('price',10,2);

            $table->string('stock');

            $table->string('img_url')->nullable();

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')
                  ->references('id')->on('categories')
                  ->cascadeOnUpdate()->restrictOnDelete();

            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')
                  ->on('users')->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamp('created_at')->useCurrent();

            $table->timestamp('updated-at')->useCurrent()
                  ->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
