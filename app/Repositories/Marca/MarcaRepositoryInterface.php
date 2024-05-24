<?php

namespace App\Repositories\Marca;

use Illuminate\Http\Request;

interface MarcaRepositoryInterface
{
    public function getAllMarcas(Request $request);
    public function getAllMarcasPaginado(Request $request);
}
