<?php

/** 
 * @var \Illuminate\Database\Eloquent\Factory $factory 
 **/

use Mpcs\Banner\Models\BannerGroup;
use Illuminate\Support\Arr;

use Faker\Generator as Faker;

$factory->define(BannerGroup::class, function (Faker $faker) {
    $type = array_keys(BannerGroup::$typeStrings);
    $date = $faker->dateTimeThisMonth;
    $ratio = ['400', '500', '600', '700', '800', '900'];

    return [
        'name' => $faker->word,
        'code' => $faker->unique()->word,
        'description' => $faker->sentence(),
        'type' => Arr::random($type),
        'pc_width' => Arr::random($ratio),
        'pc_height' => Arr::random($ratio),
        'mobile_width' => Arr::random($ratio),
        'mobile_height' => Arr::random($ratio),
        'is_visible' => $faker->boolean,
        'created_at' => $date,
        'updated_at' => $date,
    ];
});
