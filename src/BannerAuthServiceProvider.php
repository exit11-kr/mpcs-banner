<?php

namespace Mpcs\Banner;

use Mpcs\Banner\Models;
use Mpcs\Banner\Policies;
use Mpcs\Core\Facades\Core;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class BannerAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Models\BannerGroup::class => Policies\BannerGroupPolicy::class,
        Models\Banner::class => Policies\BannerPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();
    }
}
