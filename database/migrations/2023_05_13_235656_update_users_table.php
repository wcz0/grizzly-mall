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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('spread_open');
            $table->dropColumn('spread_id');
            $table->unsignedTinyInteger('is_spread')->default(0)->comment('是否是推广员 0否 1是');
            $table->unsignedBigInteger('spread_user')->default(0)->comment('推广员ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('spread_open')->default(0)->comment('是否开启推广 0否 1是');
            $table->unsignedBigInteger('spread_id')->default(0)->comment('推广ID');
            $table->dropColumn('is_spread');
            $table->dropColumn('spread_user');
        });
    }
};
