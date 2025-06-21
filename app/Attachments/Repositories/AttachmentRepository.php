<?php

declare(strict_types=1);

namespace App\Attachments\Repositories;

use App\Attachments\Interfaces\AttachmentRepositoryInterface;
use App\Attachments\Models\Attachment;
use App\Base\Repositories\BaseRepository;

class AttachmentRepository extends BaseRepository implements AttachmentRepositoryInterface
{
    protected string $model = Attachment::class;
}
