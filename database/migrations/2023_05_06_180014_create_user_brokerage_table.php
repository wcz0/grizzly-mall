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
        Schema::create('user_brokerage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('link_id')->default('');
            $table->unsignedTinyInteger('type');
            $table->string('title')->default('');
            $table->decimal('number');
            $table->decimal('balance');
            $table->unsignedTinyInteger('pm')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('mark')->default('');
            $table->unsignedTinyInteger('state')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('take')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->timestamp('frozen_time');
            $table->timestamps();
            $table->index(['type', 'link_id']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_brokerage');
    }
};
