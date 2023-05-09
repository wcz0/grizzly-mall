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
        Schema::create('label_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->index();
            $table->unsignedBigInteger('owner_user')->index();
            $table->string('name')->index()->default('');
            $table->unsignedInteger('sort')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('type')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('label_category');
    }
};
