<?php

declare(strict_types=1);

namespace App\Attachments\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
    ];

    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}
