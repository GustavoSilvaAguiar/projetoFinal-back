<?php

namespace App\Services;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
use App\DTO\UsuarioDTO;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use stdClass;

class UserService
{
    public function __construct(
        protected UserRepositoryInterface $repository
    ) {
    }

    public function getAllUsers(Request $request): LengthAwarePaginator
    {
        return $this->repository->getAllUsers($request);
    }

    public function getUser(string $id): stdClass | null
    {
        return $this->repository->getUser($id);
    }

    public function postUser(UsuarioDTO $dto): stdClass | null {
        return $this->repository->postUser($dto);
    }

    public function putUser(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass {
        return $this->repository->putUser($dto, $enderecoDTO, $contatoDTO);
    }

    public function postUserComplete(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass {
        return $this->repository->postUserComplete($dto, $enderecoDTO, $contatoDTO);
    }
}
