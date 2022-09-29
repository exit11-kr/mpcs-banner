<?php

namespace Mpcs\Banner;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Mpcs\Core\Facades\Core;

class BannerServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        Commands\InstallCommand::class,
        Commands\SeedCommand::class,
    ];


    public function boot()
    {

        // 뷰템플릿 로드
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mpcs-banner');

        /* 콘솔에서 vendor:publish 가동시 설치 파일 */
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

        /* 라우터, 다국어 */
        $this->app->booted(function () {

            // 다국어 알리어스를 mpcs로 네이밍 규칙을 통일하여 사용하기로 함
            $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'mpcs-banner');
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });

        // Core::dataSelect() 형성시 '_vendor' => 'namepsace' 제외 처리 가능
        Core::setPackageModelVendors(__NAMESPACE__, __DIR__);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../config/mpcsbanner.php', 'mpcsbanner');

        $this->commands($this->commands);
        $this->registerEloquentFactoriesFrom(__DIR__ . '/../database/factories');
        $this->app->bind('Mpcs\Banner\Repositories\BannerGroupRepositoryInterface', 'Mpcs\Banner\Repositories\BannerGroupRepository');
        $this->app->bind('Mpcs\Banner\Repositories\BannerRepositoryInterface', 'Mpcs\Banner\Repositories\BannerRepository');
    }

    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }
}
