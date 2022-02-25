<?php

namespace Exit11\Banner;

use Exit11\Banner\Models;
use Exit11\Banner\Policies;
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
        // Auth
        Auth::shouldUse(Core::getConfig('auth_guard'));
        $this->registerPolicies();
    }
}
