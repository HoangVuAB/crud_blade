<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{

    /**
     * @param Model $model
     */
    public function __construct(protected Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $id
     *
     * @return Model | flase
     */
    public function getById($id) : Model
    {
        # code...
        return Model::findOrFail($id);
    }

    /**
     * @param array $attribute
     *
     * @return bool
     */
    public function create(array $attribute) :Model
    {
       return $this->model->create($attribute);
    }

    /**
     * @param Model $model
     *
     * @return bool
     */
    public function update(Model $model, array $data) : bool
    {
        # code...
        return $model->update($data);
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function delete($id) : bool
    {
        $item = $this->getById($id);
        return $item->delete();
    }

}
