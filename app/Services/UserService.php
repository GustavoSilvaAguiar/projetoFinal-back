<?php

namespace App\Services;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
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
        return $this->repository->getUser($id);
    }

    public function postUser(UsuarioDTO $dto): stdClass | null {
        return $this->repository->postUser($dto);
    }

    public function putUser(UsuarioDTO $dto): stdClass {
        return $this->repository->putUser($dto);
    }

    public function postUserComplete(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass {
        return $this->repository->postUserComplete($dto, $enderecoDTO, $contatoDTO);
    }
}
