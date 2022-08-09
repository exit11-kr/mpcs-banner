<?php

namespace Mpcs\Banner\Http\Controllers\Blade;

use Mpcs\Core\Facades\Core;
use Mpcs\Banner\Facades\Banner;
use Mpcs\Banner\Http\Controllers\Api\BannerGroupController as Controller;
use Mpcs\Banner\Http\Requests\BannerGroupRequest as Request;
use Mpcs\Banner\Models\BannerGroup as Model;

class BannerGroupController extends Controller
{
    /**
     * index
     * @param  mixed $request
     * @return view
     */
    public function index(Request $request)
    {
        $groups = $this->service->index();
        $groups = $groups->pluck('name', 'id')->prepend('선택', '')->toArray();

        $types = Model::getAllowTypes();
        return view(Banner::theme('banner_groups.index'), compact('groups', 'types'))->withInput($request->flash());
    }

    /**
     * list
     * @param  mixed $request
     * @return view
     */
    public function list(Request $request)
    {
        $datas = $this->service->index();
        return view(Banner::theme('banner_groups.partials.list'), compact('datas'))->withInput($request->flash());
    }
}
