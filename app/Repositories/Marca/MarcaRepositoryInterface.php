<?php

namespace App\Repositories\Marca;

use App\DTO\ContatoDTO;
use App\DTO\MarcaDTO;
use Illuminate\Http\Request;

interface MarcaRepositoryInterface
{
    public function getAllMarcas(Request $request);
    public function getAllMarcasPaginado(Request $request);
    public function postMarca(MarcaDTO $dto);
    public function putMarca(MarcaDTO $dto);
}
