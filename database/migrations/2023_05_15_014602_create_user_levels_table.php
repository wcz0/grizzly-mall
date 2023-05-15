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
        Schema::create('user_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('level_id');
            $table->unsignedInteger('grade');
            $table->dateTime('valid_time');
            $table->unsignedTinyInteger('is_forever');
            $table->unsignedInteger('mer_id')->default(0);
            $table->unsignedTinyInteger('state')->default(1);
            $table->string('mark')->default('');
            $table->unsignedTinyInteger('remind')->default(0);
            $table->unsignedInteger('discount');
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
        Schema::dropIfExists('user_levels');
    }
};
