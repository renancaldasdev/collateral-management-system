<?php

declare(strict_types=1);

namespace App\Products\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Products\Interfaces\ProductRepositoryInterface;
use App\Products\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected string $model = Product::class;
}
