<?php

namespace App\Repositories;

use App\Models\Usuario;

class UserEloquentORM implements UserRepositoryInterface
{

    public function __construct(
        protected Usuario $model
    ) {
    }

    public function getAllUsers(): array
    {
        return $this->model->get()->toArray();
    }
    /* public function getUser(string $id): stdClass
    {
        return '';
    } */
}
