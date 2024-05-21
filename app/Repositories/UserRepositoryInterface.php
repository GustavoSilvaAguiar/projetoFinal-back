<?php

namespace App\Repositories;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
use App\DTO\UsuarioDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use stdClass;

interface UserRepositoryInterface
{
    public function getAllUsers(Request $request): LengthAwarePaginator;
    public function getUser(string $id): stdClass | null;
    public function postUser(UsuarioDTO $dto): stdClass;
    public function putUser(UsuarioDTO $dto): stdClass | null;
    public function postUserComplete(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass;
}
