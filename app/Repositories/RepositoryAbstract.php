<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class RepositoryAbstract implements RepositoryInterface
{
    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $id
     *
     * @return Model | flase
     */
    public function getById($id)
    {
        # code...
        return $this->model->findOrFail($id);
    }



    /**
     * @param array $attribute
     *
     * @return bool
     */
    public function create(array $attribute)
    {
       return $this->model->create($attribute);
    }

  
    /**
     * @param Model $model
     * 
     * @return bool
     */
    public function update(Model $model, array $data)
    {
        # code...
        return $model->update($data);
    }

   
}
