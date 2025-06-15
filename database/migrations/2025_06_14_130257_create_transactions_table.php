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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade'); // Booking jadvalga foreign key
            $table->string('payment_system')->default('payme'); // payme, click, cash, etc.
            $table->string('transaction_id')->nullable(); // Payme transaction id
            $table->string('payment_status')->nullable(); // Payme transaction id
            $table->string('state')->default('created'); // created, performed, cancelled
            $table->unsignedBigInteger('amount'); // Summa so'mda
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
        Schema::dropIfExists('transactions');
    }
};
