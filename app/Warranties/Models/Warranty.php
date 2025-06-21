<?php

declare(strict_types=1);

namespace App\Warranties\Models;

use App\Attachments\Models\Attachment;
use App\Products\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Warranty extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'product_id',
        'start_date',
        'duration_months',
        'invoice_file_path',
        'observations',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function isWarrantyValid(): bool
    {
        $endDate = $this->start_date->copy()->addMonths($this->duration_months);
        return now()->lte($endDate);
    }

    public function endDate(): Carbon
    {
        return $this->start_date->copy()->addMonths($this->duration_months);
    }

    public function attachment(): MorphOne
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
