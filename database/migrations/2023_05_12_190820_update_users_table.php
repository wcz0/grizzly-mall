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
            $table->dropColumn('is_money_level');
            $table->dropColumn('is_ever_level');
            $table->unsignedTinyInteger('member_level')->default(0);
            $table->unsignedTinyInteger('member_ever')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('member_level');
            $table->dropColumn('member_ever');
            $table->unsignedTinyInteger('is_money_level')->default(0);
            $table->unsignedTinyInteger('is_ever_level')->default(0);
        });

    }
};
