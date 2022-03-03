<?php

namespace Exit11\Banner;

use Illuminate\Support\Facades\Storage;
use MpcsUi\Bootstrap5\Facades\Bootstrap5;

class Banner
{

    /**
     * VIEW THEME 설정
     * @return string {default: 'default'}
     */
    public static function theme($view, $template = null)
    {
        $viewTemplate = empty($template) ? 'default' : $template;
        return 'mpcs-banner::' . $viewTemplate . '.' . $view;
    }


    /**
     * perPage
     *
     * @param  mixed $configString
     * @param  mixed $default
     * @return void
     */
    public static function getPerPage()
    {
        return config('mpcsbanner.per_page') ?? 15;
    }
}
