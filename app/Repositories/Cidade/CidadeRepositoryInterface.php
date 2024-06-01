<?php

namespace App\Repositories\Cidade;

use Illuminate\Http\Request;

interface CidadeRepositoryInterface {
    public function getAllCidades(Request $request);
}