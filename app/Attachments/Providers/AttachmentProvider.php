<?php

declare(strict_types=1);

namespace App\Attachments\Providers;

use App\Attachments\Interfaces\AttachmentRepositoryInterface;
use App\Attachments\Repositories\AttachmentRepository;
use Illuminate\Support\ServiceProvider;

class AttachmentProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AttachmentRepositoryInterface::class, AttachmentRepository::class);
    }
}
