<?php

namespace Mpcs\Banner\Repositories;

use Mpcs\Banner\Models\BannerGroup as Model;
use Mpcs\Core\Traits\RepositoryTrait;
use Illuminate\Support\Str;

class BannerGroupRepository implements BannerGroupRepositoryInterface
{
    use RepositoryTrait;

    public function __construct(Model $model)
    {
        $this->repositoryInit($model);
    }

    // Get all instances of model
    public function select($enableRequestParam = false, $isApiSelect = false)
    {
        $apiSelectParams = [
            'item_list' => ['id', 'name', 'is_visible'],
            'attribute_name' => trans('mpcs-banner::word.attributes.group')
        ];
        $model = $this->model::search($enableRequestParam);
        return $this->getSelectFormatter($model, $isApiSelect, $apiSelectParams);
    }

    // Get all instances of model
    public function all()
    {
        $model = $this->model::search()->sortable($this->model->defaultSortable);
        return $model->with($this->model::getDefaultLoadRelations())->paging();
    }

    // create a new record in the database
    public function create()
    {
        $this->model->name = $this->request['name'];
        $this->model->code = Str::lower($this->request['code']);
        $this->model->description = $this->request['description'] ?? null;
        $this->model->type = $this->request['type'];
        $this->model->pc_width = $this->request['pc_width'] ?? null;
        $this->model->pc_height = $this->request['pc_height'] ?? null;
        $this->model->mobile_width = $this->request['mobile_width'] ?? null;
        $this->model->mobile_height = $this->request['mobile_height'] ?? null;
        $this->model->is_visible = $this->request['is_visible'] ?? false;
        $this->model->save();

        return $this->model->loadRelations();
    }

    // update record in the database
    public function update($model)
    {
        $model->name = $this->request['name'];
        $model->code = Str::lower($this->request['code']);
        $model->description = $this->request['description'] ?? null;
        $model->type = $this->request['type'];
        $model->pc_width = $this->request['pc_width'];
        $model->pc_height = $this->request['pc_height'];
        $model->mobile_width = $this->request['mobile_width'];
        $model->mobile_height = $this->request['mobile_height'];
        $model->is_visible = $this->request['is_visible'] ?? false;
        $model->save();

        return $model->loadRelations();
    }

    // show the record with the given id
    public function get($model)
    {
        return $model->loadRelations();
    }

    // remove record from the database
    public function delete($model)
    {
        return $model->delete();
    }
}
