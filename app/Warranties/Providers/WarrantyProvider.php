<?php

declare(strict_types=1);

namespace App\Warranties\Providers;

use App\Warranties\Interfaces\WarrantyRepositoryInterface;
use App\Warranties\Repositories\WarrantyRepository;
use Illuminate\Support\ServiceProvider;

class WarrantyProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(WarrantyRepositoryInterface::class, WarrantyRepository::class);
    }
}
