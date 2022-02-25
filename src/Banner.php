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
     * noImage
     *
     * @return void
     */
    public static function noImage()
    {
        return Bootstrap5::noImage();
    }
}
