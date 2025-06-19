<?php

declare(strict_types=1);

namespace App\Products\Providers;

use App\Products\Interfaces\ProductRepositoryInterface;
use App\Products\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
