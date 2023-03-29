<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Router;
use Mpcs\Core\Facades\Core;

// Api Route
Route::group([
    'as'          => Core::getRouteNamePrefix('api'),
    'prefix'        => Core::getUrlPrefix('api'),
    'namespace'     => 'Mpcs\Banner\Http\Controllers\Api',
    'middleware'    => Core::getUniversalMiddlewares('api'),
], function (Router $router) {
    $router->resource('banner_groups', 'BannerGroupController')->names('banner_groups')->except(['destroy']);
    $router->resource('banners', 'BannerController')->names('banners');
});


// Blade Route
Route::group([
    'as'          => Core::getRouteNamePrefix('ui'),
    'prefix'        => Core::getUrlPrefix('ui'),
    'namespace'     => 'Mpcs\Banner\Http\Controllers\Blade',
    'middleware'    => Core::getUniversalMiddlewares('ui'),
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
//     'namespace'     => 'Mpcs\Banner\Http\Controllers\Api',
//     'middleware'    => Core::getUniversalMiddlewares('open'),
// ], function (Router $router) {
//     $router->resource('banners', 'PopupController')->names('banners')->only(['index', 'show']);
// });
