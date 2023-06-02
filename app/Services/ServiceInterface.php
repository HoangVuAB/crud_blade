<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface ServiceInterface
{
    public function getAll();
    public function getById($id);
    public function create($attribute);
    public function update(Model $model,$data);
    public function delete($id);

}
