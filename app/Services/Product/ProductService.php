<?php
namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use App\Services\ServiceInterface;


class ProductService
{

    public function __construct(protected ProductRepository $productRepository)
    {
        # code...
        $this->productRepository = $productRepository;
    }

    /**
     * @return  \App\Repositories\Product\Illuminate\Database\Eloquent\Builder
     */
    public function getAllProduct()
    {
        return $this->productRepository->getAll();
    }
    /**
     * @param string $keyword
     * 
     * @return \App\Repositories\Product\Illuminate\Database\Eloquent\Builder
     */
    public function getAllProductByName($keyword)
    {
        return $this->productRepository->getBySearch($keyword);
    }

    /**
     * @param mixed $id
     * 
     * @return \App\Repositories\Product\Illuminate\Database\Eloquent\Builder
     */
    public function getByIdProduct($id)
    {
        return $this->productRepository->getById($id);
    }
    /**
     * @param mixed $attribute
     * 
     * @return mixed
     */
    public function createProduct($attribute)
    {
        return $this->productRepository->create($attribute);

    }
    /**
     * @param Product $product
     * @param mixed $data
     * 
     * @return bool
     */
    public function updateProduct(Product $product, $data)
    {
        return $this->productRepository->update($product, $data);
    }
    /**
     * @param mixed $id
     * 
     * @return mixed
     */
    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }


}

?>