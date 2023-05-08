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
        Schema::create('user_address', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('name')->default('');
            $table->string('phone')->default('');
            $table->string('province')->default('');
            $table->string('city')->default('');
            $table->unsignedInteger('city_id');
            $table->string('district')->default('');
            $table->string('detail')->default('');
            $table->string('post_code')->default('');
            $table->string('longitude')->default('');
            $table->string('latitude')->default('');
            $table->unsignedTinyInteger('is_default')->index()->default(new \Illuminate\Database\Query\Expression('1'));
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
        Schema::dropIfExists('user_address');
    }
};
