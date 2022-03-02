<?php

namespace Exit11\Banner\Http\Controllers\Blade;

use Mpcs\Core\Facades\Core;


use Exit11\Banner\Http\Controllers\Api\BannerController as Controller;
use Exit11\Banner\Http\Requests\BannerRequest as Request;
use Exit11\Banner\Facades\Banner;

class BannerController extends Controller
{

    /**
     * index
     * @param  mixed $request
     * @return view
     */
    public function index(Request $request)
    {
        $categories = Core::dataSelect('banner_groups', ['_vendor' => 'Exit11\Banner', 'is_visible' => true]);

        // 그룹지정없이 들어올 경우 강제 리다이렉트
        if (!$request->banner_group_id) {
            return redirect()->route(Core::getConfig('ui_route_name_prefix') . '.banners.index', ['banner_group_id' => $categories->first()->id]);
        }

        $currentCategory = $categories->where('id', $request->banner_group_id)->first();

        return view(Banner::theme('banners.index'), compact('categories', 'currentCategory'))->withInput($request->flash());
    }

    /**
     * list
     * @param  mixed $request
     * @return view
     */
    public function list(Request $request)
    {
        // 모델 조회시 옵션설정(페이징여부, 검색조건)
        $this->addOption('_per_page', 15);
        $this->addOption('sort', ["order" => "desc"]);
        $datas = $this->service->index();
        return view(Banner::theme('banners.partials.list'), compact('datas'))->withInput($request->flash());
    }
}
