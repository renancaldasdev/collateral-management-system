<?php

declare(strict_types=1);

namespace App\Users\Providers;

use App\Users\Interfaces\UserRepositoryInterface;
use App\Users\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
