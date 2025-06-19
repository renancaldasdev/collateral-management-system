<?php

declare(strict_types=1);

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    public function save (Model $model): Model;

    public function findAll(): Collection;

    public function all(int $per_page = 20, array $orderBy = []): LengthAwarePaginator;

    public function find(int $id): ?Model;

    public function delete(int $id): void;

    public function update(int $id, array $data): Model;

    public function updateOrCreate(array $conditions = [], array $data = []): Model;
}
