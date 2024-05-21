<?php

namespace App\Repositories;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
use App\DTO\UsuarioDTO;
use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Usuario;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use stdClass;

class UserEloquentORM implements UserRepositoryInterface
{

    public function __construct(
        protected Usuario $model,
        protected Endereco $enderecoModel,
        protected Contato $contatoModel
    ) {
    }

    public function getAllUsers(Request $request): LengthAwarePaginator//: array
    {
        //$filter = $request?->filter ? $request->filter : '';
        return $this->model->with('endereco', 'contato')->paginate();
        //return $this->model->leftJoin('enderecos', 'usuarios.idendereco', '=', 'enderecos.id')->get()->toArray();
    }
    public function getUser(string $id): stdClass | null
    {
        $response = (object) $this->model->with('endereco', 'contato')->find($id)->toArray();
        return $response;
    }

    public function postUser(UsuarioDTO $dto): stdClass
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }

    public function postUserComplete(UsuarioDTO $dto, EnderecoDTO $enderecoDTO, ContatoDTO $contatoDTO): stdClass
    {
        $response = $this->model->create((array) $dto);

        $endereco = $this->enderecoModel->create((array) $enderecoDTO);

        $contato = $this->contatoModel->create((array) $contatoDTO);

        $response->endereco()->associate($endereco);

        $response->contato()->associate($contato);

        $response->save();

        return (object) $response->toArray();
    }

    public function putUser(UsuarioDTO $dto): stdClass | null
    {
        $user = $this->model->find($dto->id);
        if(!$user) {
            return null;
        }

        $user->update((array) $dto);
        //$response = $this->model->update((array) $dto);

        return (object) $user->toArray();
    }
}
