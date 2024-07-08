<?php

namespace App\Repositories\Fornecedor;

use App\DTO\ContatoDTO;
use App\DTO\FornecedorDTO;
use Illuminate\Http\Request;

interface FornecedorRepositoryInterface {
    public function getAllFornecedores(Request $request);
    public function getAllFornecedoresPaginado(Request $request);
    public function postFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO);
    public function putFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO);
}