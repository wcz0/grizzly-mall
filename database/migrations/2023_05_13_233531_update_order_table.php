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
        Schema::rename('store_order', 'store_orders');
        Schema::table('store_orders', function (Blueprint $table) {
            $table->dropColumn('is_mer_check');
            $table->unsignedTinyInteger('is_mer')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store_orders', function (Blueprint $table) {
            $table->unsignedTinyInteger('is_mer_check')->default(0);
            $table->dropColumn('is_mer');
        });
        Schema::rename('store_orders', 'store_order');
    }
};
