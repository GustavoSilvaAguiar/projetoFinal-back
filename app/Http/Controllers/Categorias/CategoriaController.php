<?php

namespace App\Http\Controllers\Categorias;

/* use App\DTO\CategoriaDOT; */

use App\DTO\CategoriaDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaPostUpdateRequest;
use App\Services\CategoriaService;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function __construct(
        protected CategoriaService $service
    ) {
    }

    public function getAllCategoria()
    {
        $categoria = $this->service->getAllCategoria();

        return $categoria;
    }

    public function postCategoria(CategoriaPostUpdateRequest $request)
    {
        $response = $this->service->postCategoria(CategoriaDTO::makeFromRequest($request));
        return $response;
    }
}
