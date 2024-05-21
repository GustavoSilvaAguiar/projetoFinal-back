<?php

namespace App\Http\Controllers\Usuarios;

use App\DTO\ContatoDTO;
use App\DTO\EnderecoDTO;
use App\DTO\UsuarioDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoPostUpdateRequest;
use App\Http\Requests\EnderecoPostUpdateRequest;
use App\Http\Requests\UsuarioPostUpdateRequest;
use App\Models\Usuario;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserService $service
    ) {
    }

    public function index(Request $request)
    {
        //return $request;
        $users = $this->service->getAllUsers($request);
        //$users = Usuario::paginate($perPage = 20);

        return $users;
    }

    public function getUser(string $id)
    {
        //dd($id);
        $user = $this->service->getUser($id);

        return $user;
    }

    public function postUser(UsuarioPostUpdateRequest $request)
    {
        $response = $this->service->postUser(UsuarioDTO::makeFromRequest($request));

        return $response;
    }

    public function putUser(UsuarioPostUpdateRequest $request)
    {
        $response = $this->service->putUser(UsuarioDTO::makeFromRequest($request));

        return $response;
    }

    public function postUserComplete(UsuarioPostUpdateRequest $request, EnderecoPostUpdateRequest $enderecoRequest, ContatoPostUpdateRequest $contatoRequest)
    {
        $response = $this->service->postUserComplete(UsuarioDTO::makeFromRequest($request), EnderecoDTO::makeFromRequest($enderecoRequest), ContatoDTO::makeFromRequest($contatoRequest));
        return $response;
    }
}
