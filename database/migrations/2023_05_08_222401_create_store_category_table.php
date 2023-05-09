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
        Schema::create('store_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('name')->default('');
            $table->unsignedInteger('sort')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('icon')->default('');
            $table->unsignedTinyInteger('is_show')->index()->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('picture')->default('');
            $table->timestamps();
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
        Schema::dropIfExists('store_category');
    }
};
