<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('username')->default('')->unique();
            $table->string('password');
            $table->string('name')->default('');
            $table->date('birthday')->nullable();
            $table->string('card_id')->default('');
            $table->string('mark')->default('');
            $table->unsignedInteger('partner_id')->default(0);
            $table->unsignedInteger('group_id')->default(0);
            $table->string('nickname')->default('');
            $table->string('avatar')->default('');
            $table->string('phone')->default('');
            $table->string('add_ip')->default('');
            $table->dateTime('last_time')->nullable();
            $table->string('last_ip')->default('');
            $table->decimal('money', 8,2)->default(0);
            $table->decimal('brokerage_price', 8,2)->default(0);
            $table->string('integral')->default('');
            $table->decimal('exp', 8,2)->default(0);
            $table->string('sign_num')->default('');
            $table->unsignedTinyInteger('state')->default(1)->index();
            $table->unsignedTinyInteger('level')->default(1)->index();
            $table->string('agent_level')->default('');
            $table->unsignedTinyInteger('spread_open')->default(0);
            $table->unsignedInteger('spread_id')->default(0)->index();
            $table->dateTime('spread_time')->nullable();
            $table->string('user_type')->default(0);
            $table->unsignedTinyInteger('is_promoter')->default(0)->index();
            $table->unsignedInteger('pay_count')->default(0);
            $table->unsignedInteger('spread_count')->default(0);
            $table->dateTime('clean_time')->nullable();
            $table->string('address')->default('');
            $table->unsignedInteger('admin_id')->default(0);
            $table->unsignedTinyInteger('login_type')->default(0);
            $table->string('record_phone')->default('');
            $table->unsignedTinyInteger('is_money_level')->default(0);
            $table->unsignedTinyInteger('is_ever_level')->default(0);
            $table->date('overdue_time')->nullable();
            $table->unsignedTinyInteger('division_type')->default(0);
            $table->unsignedTinyInteger('division_status')->default(0);
            $table->unsignedTinyInteger('is_division')->default(0);
            $table->unsignedTinyInteger('is_agent')->default(0);
            $table->unsignedTinyInteger('is_staff')->default(0);
            $table->unsignedInteger('division_id')->default(0);
            $table->unsignedInteger('agent_id')->default(0);
            $table->unsignedInteger('staff_id')->default(0);
            $table->unsignedInteger('division_percent')->default(0);
            $table->dateTime('division_change')->nullable();
            $table->dateTime('division_end_time')->nullable();
            $table->unsignedInteger('division_invite')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
