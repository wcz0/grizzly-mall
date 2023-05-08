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
        Schema::create('user_bills', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('link_id')->default('');
            $table->unsignedTinyInteger('pm')->index();
            $table->string('title')->default('');
            $table->string('category')->default('');
            $table->unsignedInteger('type');
            $table->decimal('number', 8,2);
            $table->decimal('balance');
            $table->string('mark')->default('');
            $table->unsignedTinyInteger('state')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('take')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->timestamp('frozen_time');
            $table->timestamps();
            $table->index(['category', 'type', 'link_id']);
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
        Schema::dropIfExists('user_bills');
    }
};
