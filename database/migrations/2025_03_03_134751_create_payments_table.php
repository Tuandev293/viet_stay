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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->unsignedBigInteger('booking_id');
            $table->decimal('amount', 15, 2);
            $table->enum('method', ['credit_card', 'paypal', 'on_site']);
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamp('created_at')->useCurrent();
            $table->string('promo_code', 20)->nullable();

            // Foreign Key
            $table->foreign('booking_id')->references('booking_id')->on('bookings')->onDelete('cascade');
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
