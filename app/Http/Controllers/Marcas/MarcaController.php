<?php

namespace App\Http\Controllers\Marcas;

use App\Http\Controllers\Controller;
use App\Services\MarcaService;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct(
        protected MarcaService $service
    )
    {
        
    }

    public function getAllMarcas(Request $request) {
        return $this->service->getAllMarcas($request);
    }

    public function getAllMarcasPaginado(Request $request) {
        return $this->service->getAllMarcasPaginado($request);
    }
}
