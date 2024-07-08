<?php

namespace App\Http\Controllers\Fornecedores;

use App\DTO\ContatoDTO;
use App\DTO\FornecedorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContatoPostUpdateRequest;
use App\Http\Requests\FornecedorPostUpdateRequest;
use App\Services\FornecedorService;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function __construct(
        protected FornecedorService $service
    ) {
    }

    public function getAllFornecedores(Request $request)
    {
        return $this->service->getAllFornecedores($request);
    }

    public function getAllFornecedoresPaginado(Request $request)
    {
        return $this->service->getAllFornecedoresPaginado($request);
    }

    public function postFornecedor(FornecedorPostUpdateRequest $request, ContatoPostUpdateRequest $contatoRequest)
    {
        return $this->service->postFornecedor(FornecedorDTO::makeFromRequest($request), ContatoDTO::makeFromRequest($contatoRequest));
    }

    public function putFornecedor(FornecedorPostUpdateRequest $request, ContatoPostUpdateRequest $contatoRequest)
    {
        return $this->service->putFornecedor(FornecedorDTO::makeFromRequest($request), ContatoDTO::makeFromRequest($contatoRequest));
    }
}
