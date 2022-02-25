<?php

namespace Exit11\Banner\Repositories;

interface BannerRepositoryInterface
{
    public function select($search, $sort);

    public function all();

    public function create();

    public function update($model);

    public function delete($model);

    public function get($model);

    public function orderable($model);
}
