<?php

namespace App\Repositories;

use App\DTO\UsuarioDTO;
use stdClass;

interface UserRepositoryInterface
{
    public function getAllUsers(): array;
    public function getUser(string $id): stdClass | null;
    public function postUser(UsuarioDTO $dto);
}
