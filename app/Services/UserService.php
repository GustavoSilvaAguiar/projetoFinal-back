<?php

namespace App\Services;

use App\DTO\UsuarioDTO;
use App\Repositories\UserRepositoryInterface;
use stdClass;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {
    }

    public function getAllUsers(): array
    {
        return $this->repository->getAllUsers();
    }

    public function getUser(string $id): stdClass | null
    {
        //dd($id);
        return $this->repository->getUser($id);
    }

    public function postUser(UsuarioDTO $dto) {
        return $this->repository->postUser($dto);
    }
}
