<?php

namespace Mpcs\Banner\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Mpcs\Core\Traits\ControllerTrait;
use Mpcs\Banner\Http\Requests\BannerRequest as Request;
use Mpcs\Banner\Services\BannerService as Service;
use Mpcs\Banner\Models\Banner as Model;
use Mpcs\Core\Facades\Core;
use Mpcs\Banner\Facades\Banner as Facade;
use Mpcs\Banner\Http\Resources\Banner as Resource;
use Mpcs\Banner\Http\Resources\BannerCollection as ResourceCollection;

class BannerController extends Controller
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
        // 모델 조회시 옵션설정(페이징여부, 검색조건)
        $this->addOption('_per_page', Facade::getPerPage());
        $this->addOption('sort', ["order" => "desc"]);
        return new ResourceCollection($this->service->index());
    }

    /**
     * edit
     *
     * @param  mixed $banner
     * @return void
     */
    public function edit(Model $banner)
    {
        return new Resource($this->service->edit($banner));
    }

    /**
     * show
     *
     * @param  mixed $banner
     * @return void
     */
    public function show(Model $banner)
    {
        return new Resource($this->service->show($banner));
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
    public function update(Request $request, Model $banner)
    {
        return new Resource($this->service->update($banner));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $banner)
    {
        return Core::responseJson($this->service->destroy($banner));
    }

    /**
     * orderable
     *
     * @param  mixed $request
     * @return void
     */
    public function orderable(Request $request, Model $banner)
    {
        return Core::responseJson($this->service->orderable($banner));
    }
}
