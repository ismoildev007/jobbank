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
        Schema::create('payme_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->string('transaction_id')->nullable(); // Payme transaction id
            $table->string('payment_status')->nullable(); // Payme transaction id
            $table->integer('state')->default(0); // 0 = created, 1 = performed, 2 = cancelled
            $table->unsignedBigInteger('amount');
            $table->timestamp('create_time')->nullable();
            $table->timestamp('perform_time')->nullable();
            $table->timestamp('cancel_time')->nullable();
            $table->string('reason')->nullable(); // cancel uchun sababi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payme_transactions');
    }
};
