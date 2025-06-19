<?php

declare(strict_types=1);

namespace App\Base\Repositories;

use App\Base\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{

    protected string $model;

    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }

    public function findAll(): Collection
    {
        return $this->model::all();
    }

    public function all(int $per_page = 20, array $orderBy = []): LengthAwarePaginator
    {
        $results = $this->model::query();

        $finalResults = $this->orderByQuery($results, $orderBy);

        return $finalResults->paginate($per_page)
            ->appends([
                'orderBy' => implode(',', array_keys($orderBy)),
                'per_page' => $per_page,
            ]);
    }

    public function find(int $id): ?Model
    {
        return $this->model::findOrFail($id);
    }

    public function delete(int $id): void
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function update(int $id, array $data): Model
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function updateOrCreate(array $conditions = [], array $data = []): Model
    {
        if($conditions == []){
            return $this->model::updateOrCreate($data);
        }

        return $this->model::updateOrCreate($conditions, $data);
    }

    protected function orderByQuery(Builder $results, array $orderBy): Builder
    {
        foreach ($orderBy as $key => $value) {
            if(str_contains($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results;
    }
}
