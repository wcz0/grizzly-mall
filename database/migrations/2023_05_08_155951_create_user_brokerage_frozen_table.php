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
        Schema::create('user_brokerage_frozen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('price', 8,2);
            $table->unsignedInteger('uill_id');
            $table->dateTime('frozen_time');
            $table->unsignedTinyInteger('state')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            $table->index(['user_id', 'state']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_brokerage_frozen');
    }
};
