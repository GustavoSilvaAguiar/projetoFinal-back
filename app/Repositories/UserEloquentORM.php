<?php

namespace App\Repositories;

use App\DTO\UsuarioDTO;
use App\Models\Usuario;
use stdClass;

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
    public function getUser(string $id): stdClass | null
    {
        //dd($id);
        $response = (object) $this->model->find($id)->toArray();
        //dd($response);
        return $response;
    }

    public function postUser(UsuarioDTO $dto)
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }
}
