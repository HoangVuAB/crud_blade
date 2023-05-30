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
     * @param mixed $product
     * 
     * @return [type]
     */
    public function getByIdProduct($product)
    {
        return $this->productRepository->getById($product);
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
     * @param Product $product
     * 
     * @return [type]
     */
    public function deleteProduct(Product $product)
    {
        return $this->productRepository->delete($product);
    }


}

?>