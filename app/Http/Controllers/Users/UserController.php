<?php

namespace App\Http\Controllers\Users;

use App\DTO\UsuarioDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioPostUpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Client\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserService $service
    ) {
    }

    public function index() {
        $users = $this->service->getAllUsers();

        return $users;
    }

    public function getUser(string $id) {
        //dd($id);
        $user = $this->service->getUser($id);

        return $user;
    }

    public function postUser(UsuarioPostUpdateRequest $request) {
        $response = $this->service->postUser(UsuarioDTO::makeFromRequest($request));

        return $response;
    }
}
