<?php

declare(strict_types=1);

namespace App\Warranties\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Warranties\Interfaces\WarrantyRepositoryInterface;
use App\Warranties\Models\Warranty;

class WarrantyRepository extends BaseRepository implements WarrantyRepositoryInterface
{
    protected string $model = Warranty::class;
}
