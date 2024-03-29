<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedSmallInteger('banner_group_id');
            $table->integer('order')->unsigned()->default(1);
            $table->string('title', 100);
            $table->text('content')->nullable();
            $table->string('pc_image')->nullable();
            $table->string('mobile_image')->nullable();
            $table->string('color', 50)->nullable();
            $table->string('url')->nullable();
            $table->boolean('target')->default(0);
            $table->dateTime('period_from');
            $table->dateTime('period_to');
            $table->boolean('is_visible')->default(0);
            $table->unsignedBigInteger('user_id')->index();
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
        Schema::dropIfExists('banners');
    }
}
