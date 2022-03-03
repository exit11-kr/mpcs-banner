<?php

namespace Exit11\Banner\Http\Controllers\Blade;

use Mpcs\Core\Facades\Core;
use Exit11\Banner\Http\Controllers\Api\BannerController as Controller;
use Exit11\Banner\Http\Requests\BannerRequest as Request;
use Exit11\Banner\Facades\Banner as Facade;

class BannerController extends Controller
{

    /**
     * index
     * @param  mixed $request
     * @return view
     */
    public function index(Request $request)
    {
        $groups = Core::dataSelect('banner_groups', ['_vendor' => 'Exit11\Banner', 'is_visible' => true]);

        // 그룹이 형성되지 않았을 경우
        if ($groups->count() == 0) {
            // 로그인페이지로 토스트메세지 전달
            Core::toast([
                'message' => "Banner Group is not created. Please contact the administrator.",
                'title' => "Banner Group is not created",
                'variant' => 'error',
            ]);
            return redirect()->route(Core::getConfig('ui_route_name_prefix') . ".home");
        }

        $currentGroup = $groups->where('id', $request->banner_group_id)->first();

        // 그룹지정없이 들어올 경우 강제 리다이렉트
        if (!$request->banner_group_id || !$currentGroup) {
            return redirect()->route(Core::getConfig('ui_route_name_prefix') . '.banners.index', ['banner_group_id' => $groups->first()->id]);
        }

        return view(Facade::theme('banners.index'), compact('groups', 'currentGroup'))->withInput($request->flash());
    }

    /**
     * list
     * @param  mixed $request
     * @return view
     */
    public function list(Request $request)
    {
        // 모델 조회시 옵션설정(페이징여부, 검색조건)
        $this->addOption('_per_page', Facade::getPerPage());
        $this->addOption('sort', ["order" => "desc"]);
        $datas = $this->service->index();
        return view(Facade::theme('banners.partials.list'), compact('datas'))->withInput($request->flash());
    }
}
