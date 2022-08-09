<?php

namespace Mpcs\Banner\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mpcs-banner:install';

    /**
     * 커맨드 설명
     *
     * @var string
     */
    protected $description = 'Install the mpcs-banner : vendor publish, migrate, seed';

    protected $isForce = false;
    protected $isReset = false;

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->isForce = true;
        $this->isReset = true;

        $confirmMessage = 'MPCS Banner를 설치하시겠습니까? DB가 초기화되어, 유실될 수 있습니다. 설치를 계속 진행하시겠습니까?';
        $confirmMessage .= PHP_EOL . '(리소스는 덮어쓰기 됩니다.)';

        if (!app()->environment(['production'])) {
            if ($this->confirm($confirmMessage)) {

                // publish
                $this->call('vendor:publish', [
                    '--provider' => 'Mpcs\Banner\BannerServiceProvider',
                    '--force' => $this->isForce
                ]);

                $this->call('db:seed', ['--class' => "Mpcs\Banner\Seeds\BannerInstallSeeder"]);

                $this->line('<info>Inserted Banner Permission</info>');
                $this->call('cache:clear');
                $this->call('config:cache');
            }
        } else {
            $this->error('운영환경에서는 실행할 수 없습니다.');
            exit();
        }
    }
}
