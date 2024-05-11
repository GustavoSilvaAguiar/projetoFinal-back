<?php

namespace App\Services;

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

    /* public function getUser(string $id): stdClass
    {
        return $this->repository->getUser($id);
    } */
}
