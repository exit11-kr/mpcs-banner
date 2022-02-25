<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Mpcs\Core\Facades\Core;

// Api Route
Route::group([
    'as'          => Core::getConfigString('route_name_prefix'),
    'prefix'        => Core::getConfig('url_prefix'),
    'namespace'     => 'Exit11\Banner\Http\Controllers\Api',
    'middleware'    => Core::getConfig('route.middleware'),
], function (Router $router) {
    $router->resource('banner_groups', 'BannerGroupController')->names('banner_groups')->except(['destroy']);
    $router->resource('banners', 'BannerController')->names('banners');
});


// Blade Route
Route::group([
    'as'          => Core::getConfigString('ui_route_name_prefix'),
    'prefix'        => Core::getConfig('ui_url_prefix'),
    'namespace'     => 'Exit11\Banner\Http\Controllers\Blade',
    'middleware'    => config('mpcs.route.middleware'),
], function (Router $router) {
    $router->get('banner_groups/list', 'BannerGroupController@list')->name('banner_groups.list');
    $router->resource('banner_groups', 'BannerGroupController')->except(['destroy']);

    $router->patch('banners/{banner}/orderable', 'BannerController@orderable')->name('banners.orderable');
    $router->get('banners/list', 'BannerController@list')->name('banners.list');
    $router->resource('banners', 'BannerController')->names('banners');
});

// Non Auth Api Route
// Route::group([
//     'as'            => "api_web",
//     'prefix'        => "api_web",
//     'namespace'     => 'Exit11\Banner\Http\Controllers\Api',
//     'middleware'    => ['web'],
// ], function (Router $router) {
//     $router->resource('banners', 'PopupController')->names('banners')->only(['index', 'show']);
// });
