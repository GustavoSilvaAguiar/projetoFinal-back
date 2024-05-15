<?php

use App\Http\Controllers\Enderecos\EnderecoController;
use App\Http\Controllers\Usuarios\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Usuários
Route::get('/usuarios', [UserController::class, 'index']);
Route::get('/usuarios/{id}', [UserController::class, 'getUser']);
Route::post('/usuarios', [UserController::class, 'postUser']);
Route::put('/usuarios/{id}', [UserController::class, 'putUser']);

Route::post('usuarios/endereco', [UserController::class, 'postUserComplete']);

//Endereço
Route::get('/enderecos', [EnderecoController::class, 'getEnderecos']);