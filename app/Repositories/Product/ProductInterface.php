<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface ProductInterface extends RepositoryInterface
{
    function getAll();
}
    
