<?php

namespace Exit11\Banner\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Exit11\Banner\Models\Banner;
use Exit11\Banner\Models\BannerCategory;

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

        Banner::truncate();
        DB::table('article_categorizables')->truncate();
        factory(Banner::class, 1000)
            ->create()
            ->each(function ($article) {
                if (BannerCategory::all()->count() > 0) {
                    $article->articleCategories()->save(BannerCategory::inRandomOrder()->first());
                }
            });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
