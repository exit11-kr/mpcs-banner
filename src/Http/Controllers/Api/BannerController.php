<?php

namespace Exit11\Banner\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Mpcs\Core\Traits\ControllerTrait;
use Exit11\Banner\Http\Requests\BannerRequest as Request;
use Exit11\Banner\Services\BannerService as Service;
use Exit11\Banner\Models\Banner as Model;
use Mpcs\Core\Facades\Core;
use Exit11\Banner\Http\Resources\Banner as Resource;
use Exit11\Banner\Http\Resources\BannerCollection as ResourceCollection;

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
        $this->addOption('_is_paging', false);
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
