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
        Schema::table('admin_users', function (Blueprint $table) {
            $table->string('last_ip')->default('');
            $table->dateTime('last_time')->default(now());
            $table->unsignedInteger('login_count')->default(0);
            $table->unsignedTinyInteger('level')->default(0);
            $table->unsignedTinyInteger('state')->default(1)->index();
            $table->unsignedInteger('division_id')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_users', function (Blueprint $table) {
            $table->dropColumn('last_ip');
            $table->dropColumn('last_time');
            $table->dropColumn('login_count');
            $table->dropColumn('level');
            $table->dropColumn('state');
            $table->dropColumn('division_id');
            $table->dropSoftDeletes();
        });
    }
};
