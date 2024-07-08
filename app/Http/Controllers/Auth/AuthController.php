<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        /* $credentials = $request->only([
            'login',
            'senha',
            'device_name'
        ]); */

        $user = Usuario::where('login', $request->login)->first();
        //$user->senha === $request->senha;


        if (
            !$user || $request->senha !== $user->senha
        ) {
            throw ValidationException::withMessages(
                ['login' => ['Credenciais esão incorretas']]
            );
        }

        $user->tokens()->delete();

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'nome' => $user->nome
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'logout' => 'Sucesso'
        ]);
    }
}
