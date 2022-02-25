<?php

namespace Exit11\Banner\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Mpcs\Core\Traits\ControllerTrait;
use Mpcs\Core\Facades\Core;

use Exit11\Banner\Http\Requests\BannerGroupRequest as Request;
use Exit11\Banner\Services\BannerGroupService as Service;
use Exit11\Banner\Models\BannerGroup as Model;
use Exit11\Banner\Http\Resources\BannerGroup as Resource;
use Exit11\Banner\Http\Resources\BannerGroupCollection as ResourceCollection;

class BannerGroupController extends Controller
{
    use ControllerTrait;
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->controllerTraitInit();
    }

    /**
     * index
     * @param  mixed $request
     * @return view
     */
    public function index(Request $request)
    {
        /* API 조회시 */
        // 모델 조회시 옵션설정(페이징여부, 검색조건)
        $this->addOption('_is_paging', false);
        return new ResourceCollection($this->service->index());
    }

    /**
     * edit
     *
     * @param  mixed $banner_group
     * @return void
     */
    public function edit(Model $banner_group)
    {
        return new Resource($this->service->edit($banner_group));
    }

    /**
     * show
     *
     * @param  mixed $banner_group
     * @return void
     */
    public function show(Model $banner_group)
    {
        return new Resource($this->service->show($banner_group));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return new Resource($this->service->store());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $banner_group)
    {
        return new Resource($this->service->update($banner_group));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $banner_group)
    {
        return Core::responseJson($this->service->destroy($banner_group));
    }
}
