<?php

namespace App\Http\Controllers\Cidades;

use App\Http\Controllers\Controller;
use App\Services\CidadeService;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function __construct(
        protected CidadeService $service
    )
    {
        
    }

    public function getAllCidades(Request $request) {
        return $this->service->getAllCidades($request);
    }
}
