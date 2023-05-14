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
        Schema::create('system_user_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mer_id')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->string('name')->default('');
            $table->decimal('money', 8,2)->default(new \Illuminate\Database\Query\Expression('0'));
            $table->date('valid_date');
            $table->unsignedTinyInteger('is_fprever')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('is_pay')->default(new \Illuminate\Database\Query\Expression('0'));
            $table->unsignedTinyInteger('state')->default(new \Illuminate\Database\Query\Expression('1'));
            $table->unsignedInteger('grade')->default(new \Illuminate\Database\Query\Expression('1'));
            $table->decimal('discount')->default('8,2');
            $table->string('image')->default('');
            $table->string('icon')->default('');
            $table->text('explain')->nullable();
            $table->integer('exp');
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
        Schema::dropIfExists('system_user_levels');
    }
};
