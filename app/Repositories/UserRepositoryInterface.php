<?php

namespace App\Repositories;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
use App\DTO\UsuarioDTO;
use stdClass;

interface UserRepositoryInterface
{
    public function getAllUsers(): array;
    public function getUser(string $id): stdClass | null;
    public function postUser(UsuarioDTO $dto): stdClass;
    public function putUser(UsuarioDTO $dto): stdClass | null;
    public function postUserComplete(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass;
}
