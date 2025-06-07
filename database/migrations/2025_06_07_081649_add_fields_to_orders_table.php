<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id');
            $table->string('address')->nullable()->after('name');
            $table->string('additional_phone')->nullable()->after('address');
            $table->text('notes')->nullable()->after('additional_phone');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['name', 'address', 'additional_phone', 'notes']);
        });
    }
};
