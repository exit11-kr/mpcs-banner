<?php

namespace Mpcs\Banner\Repositories;

use Exception;
use Mpcs\Core\Facades\Core;
use Mpcs\Banner\Models\Banner as Model;
use Mpcs\Core\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;
use Mpcs\Bootstrap5\Facades\Bootstrap5;

class BannerRepository implements BannerRepositoryInterface
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
            // id, name [,'is_visible']
            'item_list' => ['id', 'title'],
            'attribute_name' => trans('mpcs-article::word.attr.banner')
        ];
        $model = $this->model::allow()->search($enableRequestParam);

        return $this->getSelectFormatter($model, $isApiSelect, $apiSelectParams);
    }

    // Get all instances of model
    public function all()
    {
        $model = $this->model::search()->sortable(["order" => "asc"]);
        return $model->with($this->model::getDefaultLoadRelations())->paging()->onEachSide(2);
    }

    // create a new record in the database
    public function create()
    {
        /* DB 트랜젝션 시작 */
        DB::beginTransaction();
        try {
            $this->model->banner_group_id = $this->request['banner_group_id'];
            $this->model->title = $this->request['title'];
            $this->model->content = $this->request['content'] ?? null;
            $this->model->color = $this->request['color'] ?? null;
            $this->model->url = $this->request['url'] ?? null;
            $this->model->target = $this->request['target'];
            $this->model->is_visible = $this->request['is_visible'] ?? null;
            $this->model->period_from = $this->request['period_from'];
            $this->model->period_to = $this->request['period_to'];
            $this->model->user_id = Core::user()->id;

            /* 이미지 Base64 방식 저장 */
            $requestPcImage = $this->request['pc_image'] ?? null;
            if (substr($requestPcImage, 0, 10) === "data:image") {
                $base64ToFile = Bootstrap5::base64ToFile($requestPcImage, $this->model->upload_disk, $this->model->image_root_dir);
                if ($base64ToFile) {
                    $this->model->pc_image = $base64ToFile;
                }
            } else {
                $this->model->pc_image = $requestPcImage;
            }

            /* 이미지 Base64 방식 저장 */
            $requestMobileImage = $this->request['pc_image'] ?? null;
            if (substr($requestMobileImage, 0, 10) === "data:image") {
                $base64ToFile = Bootstrap5::base64ToFile($requestMobileImage, $this->model->upload_disk, $this->model->image_root_dir);
                if ($base64ToFile) {
                    $this->model->mobile_image = $base64ToFile;
                }
            } else {
                $this->model->mobile_image = $requestMobileImage;
            }


            if ($this->model->save()) {
                $result = $this->model->moveToStart();
            }

            DB::commit();
        } catch (Exception $e) {
            /* DB 트랜젝션 롤 */
            DB::rollback();
            throw $e;
        }

        return $result ? $this->model : false;
    }

    // update record in the database
    public function update($model)
    {
        /* DB 트랜젝션 시작 */
        DB::beginTransaction();
        try {
            $model->title = $this->request['title'];
            $model->content = $this->request['content'] ?? null;
            $model->target = $this->request['target'];
            $model->period_from = $this->request['period_from'];
            $model->period_to = $this->request['period_to'];
            $model->is_visible = $this->request['is_visible'] ?? null;
            $model->color = $this->request['color'] ?? null;
            $model->url = $this->request['url'] ?? null;
            $model->user_id = Core::user()->id;

            /* 이미지 Base64 방식 저장 */
            $requestPcImage = $this->request['pc_image'] ?? null;
            if (substr($requestPcImage, 0, 10) === "data:image") {
                $base64ToFile = Bootstrap5::base64ToFile($requestPcImage, $model->upload_disk, $model->image_root_dir);
                if ($base64ToFile) {
                    $model->pc_image = $base64ToFile;
                }
            } else {
                $model->pc_image = $requestPcImage;
            }

            /* 이미지 Base64 방식 저장 */
            $requestMobileImage = $this->request['mobile_image'] ?? null;
            if (substr($requestMobileImage, 0, 10) === "data:image") {
                $base64ToFile = Bootstrap5::base64ToFile($requestMobileImage, $model->upload_disk, $model->image_root_dir);
                if ($base64ToFile) {
                    $model->mobile_image = $base64ToFile;
                }
            } else {
                $model->mobile_image = $requestMobileImage;
            }

            $result = $model->save();

            DB::commit();
        } catch (Exception $e) {
            /* DB 트랜젝션 롤 */
            DB::rollback();
            throw $e;
        }

        return $result ? $model : false;
    }

    // show the record with the given id
    public function get($model)
    {
        return $model->load(['user']);
    }

    // remove record from the database
    public function delete($model)
    {
        return $model->delete();
    }

    public function orderable($model)
    {

        /* DB 트랜젝션 시작 */
        DB::beginTransaction();
        try {
            switch ($this->request['action']) {
                case 'first':
                    $model->moveToStart();
                    $message = '아이템이 처음으로 순서 지정되었습니다.';
                    break;
                case 'last':
                    $model->moveToEnd();
                    $message = '아이템이 마지막으로 순서 지정되었습니다.';
                    break;
                case 'up':
                    $model->moveOrderUp();
                    $message = '아이템이 한칸 위로 순서 지정되었습니다.';
                    break;
                case 'down':
                    $model->moveOrderDown();
                    $message = '아이템이 한칸 아래로 순서 지정되었습니다.';
                    break;
            }
            if ($model->save()) {
                $result = [
                    'title' => '순서 적용 성공',
                    'message' => $message,
                ];
            }

            DB::commit();
        } catch (Exception $e) {
            /* DB 트랜젝션 롤 */
            DB::rollback();
            throw $e;
        }

        return $result ? $result : false;
    }
}
