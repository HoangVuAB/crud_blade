<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface ProductServiceInterface extends ServiceInterface
{
    public function getAllProduct();
    public function getByIdProduct($id);
    public function createProduct($attribute);
    public function updateProduct(Model $model,$data);
    public function deleteProduct($id);

}
