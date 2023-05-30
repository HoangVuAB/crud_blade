<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{

    /**
     * Get One
     * @param $id
     * @return mixed
     */

    public function getById(Model $model);


    /**
     * Create
     * @param array $attribute[]
     * @return mixed
     *
     */

    public function create(array $attribute);

    /**
     * update
     * @param $id
     * @param Model $model
     * @return mixed
     */

    public function update(Model $model,array $attribute);

    /**
     * delete
     * @param $id
     * @return mixed
     */

    public function delete(Model $model);
}
