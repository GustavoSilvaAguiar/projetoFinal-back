<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Categorias\CategoriaController;
use App\Http\Controllers\Cidades\CidadeController;
use App\Http\Controllers\Enderecos\EnderecoController;
use App\Http\Controllers\Estoque\EstoqueController;
use App\Http\Controllers\Fornecedores\FornecedorController;
use App\Http\Controllers\InfoNutricionais\InfoNutricionalController;
use App\Http\Controllers\Marcas\MarcaController;
use App\Http\Controllers\Produtos\ProdutoController;
use App\Http\Controllers\Usuarios\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    //Usuários
    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/{id}', [UserController::class, 'getUser']);
    Route::post('/usuarios', [UserController::class, 'postUser']);
    Route::put('/usuarios/{id}', [UserController::class, 'putUser']);

    Route::post('usuarios/endereco', [UserController::class, 'postUserComplete']);

    //Endereço
    Route::get('/enderecos', [EnderecoController::class, 'getEnderecos']);

    //Categorias
    Route::get('/categorias', [CategoriaController::class, 'getAllCategoria']);
    Route::post('/categorias', [CategoriaController::class, 'postCategoria']);
    Route::post('/categorias/{id}', [CategoriaController::class, 'putCategoria']);

    //Produtos
    Route::get('/produtos', [ProdutoController::class, 'getAllProdutos']);
    Route::get('/produtos/nopage', [ProdutoController::class, 'getAllProdutosNoPage']);
    Route::get('/produtos/details/{id}', [ProdutoController::class, 'getProdutoDetail']);
    Route::post('/produtos', [ProdutoController::class, 'postProduto']);
    Route::put('/produtos', [ProdutoController::class, 'putProduto']);
    //Produtos - Info Nutricional
    Route::get('/produtos/info-nutricional/{id}', [InfoNutricionalController::class, 'getInfoNutricional']);
    Route::post('/produtos/info-nutricional', [InfoNutricionalController::class , 'postInfoNutricional']);
    Route::put('/produtos/info-nutricional', [InfoNutricionalController::class , 'putInfoNutricional']);

    //Marcas
    Route::get('/marcas', [MarcaController::class, 'getAllMarcas']);
    Route::get('/marcasPaginado', [MarcaController::class, 'getAllMarcasPaginado']);
    Route::post('/marcas', [MarcaController::class, 'postMarca']);
    Route::put('/marcas', [MarcaController::class, 'putMarca']);

    //Estoque
    Route::get('/estoque', [EstoqueController::class, 'getEstoque']);
    Route::post('/estoque', [EstoqueController::class, 'postEstoque']);

    //Fornecedores
    Route::get('/fornecedores', [FornecedorController::class, 'getAllFornecedores']);
    Route::get('/fornecedores/paginado', [FornecedorController::class, 'getAllFornecedoresPaginado']);
    Route::post('/fornecedores', [FornecedorController::class, 'postFornecedor']);
    Route::put('/fornecedores', [FornecedorController::class, 'putFornecedor']);
});

//Cidades
Route::get('/cidades', [CidadeController::class, 'getAllCidades']);
