<?php

namespace Mpcs\Banner\Seeds;

use Illuminate\Database\Seeder;

use Mpcs\Core\Models\Permission;
use Mpcs\Banner\Models\BannerGroup;

class BannerInstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // 권한 생성
        Permission::insertOrIgnore([
            [
                'name'        => 'Banner-Manage',
                'slug'        => 'banner.manage',
                'description' => 'Banner 관리',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-List',
                'slug'        => 'banner.list',
                'description' => 'Banner 목록',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-View',
                'slug'        => 'banner.view',
                'description' => 'Banner 보기',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Edit',
                'slug'        => 'banner.edit',
                'description' => 'Banner 편집',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Create',
                'slug'        => 'banner.create',
                'description' => 'Banner 생성',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Delete',
                'slug'        => 'banner.delete',
                'description' => 'Banner 삭제',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-Manage',
                'slug'        => 'banner.group.manage',
                'description' => 'Banner 관리',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-List',
                'slug'        => 'banner.group.list',
                'description' => 'Banner 목록',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-View',
                'slug'        => 'banner.group.view',
                'description' => 'Banner 보기',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-Edit',
                'slug'        => 'banner.group.edit',
                'description' => 'Banner 편집',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-Create',
                'slug'        => 'banner.group.create',
                'description' => 'Banner 생성',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
            [
                'name'        => 'Banner-Group-Delete',
                'slug'        => 'banner.group.delete',
                'description' => 'Banner 삭제',
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
            ],
        ]);

        // 메인페이지 팝업 생성
        BannerGroup::insertOrIgnore([
            [
                'name'        => 'Main Popup',
                'code'        => 'main_popup',
                'description' => 'Mainpage Popup',
                'type'        => 1,
                'width'       => 400,
                'height'      => 600,
                'is_visible'  => 1,
                'created_at'  => date("Y-m-d H:i:s"),
                'updated_at'  => date("Y-m-d H:i:s"),
                'deleted_at'  => null,
            ],
        ]);
    }
}
