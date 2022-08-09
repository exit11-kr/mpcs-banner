<?php

namespace Mpcs\Banner;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BannerBroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();
        require(__DIR__ . '/../routes/channels.php');
    }
}
