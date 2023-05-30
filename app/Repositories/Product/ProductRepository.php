<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\RepositoryAbstract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends RepositoryAbstract implements ProductInterface
{

    /**
     * @var [type]
     */
    protected $product;

    /**
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        # code...
        $this->product = $product;
    }

    /**
     * @return Illuminate\Database\Eloquent\Builder
     */
    function getAll()
    {
        # code...
        return Product::with('category')->paginate(15);
    }


    /**
     * @param string $keyword
     * 
     * @return \Illuminate\Database\Eloquent\Builder
     */

    function getBySearch(string $keyword)
    {

        return Product::with('category')->where('name', 'like', "%$keyword%")->paginate(15);
    }
    /**
     * @param array $attribute
     * 
     * @return mixed
     */
    public function create(array $attribute)
    {
        return Product::create($attribute);
    }
    /**
     * @param mixed $id
     * 
     * @return Model | false
     */
    public function getById($product)
    {
        return Product::findOrFail($product->id);
    }
    // overwrite delete method


}