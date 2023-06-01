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

    public function getById( $id);


    /**
     * Create
     * @param array $attribute[]
     * @return Model
     *
     */

    public function create(array $attribute) :  Model ;

    /**
     * update
     * @param $attribute
     * @param Model $model
     * @return mixed
     */

    public function update(Model $model,array $attribute);

    /**
     * delete
     * @param $id
     * @return mixed
     */

    public function delete( $id);
}
