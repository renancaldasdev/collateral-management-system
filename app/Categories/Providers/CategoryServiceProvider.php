<?php

declare(strict_types=1);

namespace App\Categories\Providers;

use App\Categories\Interfaces\CategoryRepositoryInterface;
use App\Categories\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }
}
