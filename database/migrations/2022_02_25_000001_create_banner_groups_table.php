<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_groups', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 100);
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();
            $table->tinyInteger('type')->unsigned()->default(1);
            $table->smallInteger('pc_width')->unsigned()->nullable();
            $table->smallInteger('pc_height')->unsigned()->nullable();
            $table->smallInteger('mobile_width')->unsigned()->nullable();
            $table->smallInteger('mobile_height')->unsigned()->nullable();
            $table->boolean('is_visible')->default(0);
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
        Schema::dropIfExists('banner_groups');
    }
}
