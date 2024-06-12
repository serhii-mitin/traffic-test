<?php

namespace App\Repositories\Api\v2;

use Illuminate\Database\Eloquent\Model;

class AbstractRepository
{
    protected Model $model;

    public function getModel(): string
    {
        return $this->model;
    }

    public function findByIdOrFail(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }
}
