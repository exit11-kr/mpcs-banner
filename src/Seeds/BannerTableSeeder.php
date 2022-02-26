<?php

namespace Exit11\Banner\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Exit11\Banner\Models\Banner;
use Exit11\Banner\Models\BannerGroup;

class BannerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        BannerGroup::truncate();
        factory(BannerGroup::class, 10)->create();

        Banner::truncate();
        factory(Banner::class, 100)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
