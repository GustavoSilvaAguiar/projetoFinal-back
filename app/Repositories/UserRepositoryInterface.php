<?php

namespace App\Repositories;

use stdClass;

interface UserRepositoryInterface
{
    public function getAllUsers(): array;
    //public function getUser(string $id): stdClass;
}
