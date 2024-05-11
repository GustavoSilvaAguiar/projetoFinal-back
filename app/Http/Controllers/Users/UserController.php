<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Client\Request;

class UserController extends Controller
{

    public function __construct(
        protected UserService $service
    ) {
    }

    public function index(Request $request) {
        $users = $this->service->getAllUsers();

        return $users;
    }
}
