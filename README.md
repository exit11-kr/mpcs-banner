# Mpcs Core Extention : Banner

## Composer Repository 추가

```
### composer-dev.json
{
    "require": {
        "exit11/banner": "dev-develop"
    },

    "repositories": [
        {
            "name": "exit11/banner",
            "type": "path",
            "url": "packages/exit11/banner"
        }
    ]

}


### composer.json

    "repositories": [
        {
            "name": "exit11/banner",
            "type": "vcs",
            "url": "git@github.com:exit11/mpcs-banner.git"
        }
    ]

```

## install

```

### 패키지 개발 설치시

git clone https://github.com/exit11/mpcs-banner.git .\packages\exit11\banner
env COMPOSER=composer-dev.json composer require exit11/banner --dev

### 프로젝트 설치시

composer require exit11/banner

### 설치 후 실행
php .\artisan mpcs-banner:install
php .\artisan config:cache
php .\artisan migrate

```

## seed

```
php .\artisan mpcs-banner:seed

```

## config > filesystem.php 에 upload 폴더 추가

```
    'upload' => [
        'driver' => 'local',
        'root' => storage_path('app/public/uploads'),
        'url' => env('APP_URL') . '/storage/uploads',
        'visibility' => 'public',
    ],

```
