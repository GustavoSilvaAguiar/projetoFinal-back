<?php

namespace App\Http\Controllers\Marcas;

use App\DTO\MarcaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\MarcaPostUpdateRequest;
use App\Services\MarcaService;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct(
        protected MarcaService $service
    ) {
    }

    public function getAllMarcas(Request $request)
    {
        return $this->service->getAllMarcas($request);
    }

    public function getAllMarcasPaginado(Request $request)
    {
        return $this->service->getAllMarcasPaginado($request);
    }

    public function postMarca(MarcaPostUpdateRequest $request)
    {
        return $this->service->postMarca(MarcaDTO::makeFromRequest($request));
    }

    public function putMarca(MarcaPostUpdateRequest $request) {
        return $this->service->putMarca(MarcaDTO::makeFromRequest($request));
    }
}
