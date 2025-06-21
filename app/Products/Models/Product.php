<?php

declare(strict_types=1);

namespace App\Products\Models;

use App\Categories\Models\Category;
use App\Users\Models\User;
use App\Warranties\Models\Warranty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'brand',
        'model',
        'purchase_date',
        'place_of_purchase',
        'warranty_period',
        'invoice_file_path',
        'observation',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'warranty_period' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function warranty(): HasOne
    {
        return $this->hasOne(Warranty::class);
    }

}
