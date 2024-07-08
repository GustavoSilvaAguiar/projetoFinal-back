<?php

namespace App\Services;

use App\Repositories\Cidade\CidadeRepositoryInterface;
use Illuminate\Http\Request;

class CidadeService
{
    public function __construct(
        protected CidadeRepositoryInterface $repository
    ) {
    }

    public function getAllCidades(Request $request)
    {
        return $this->repository->getAllCidades($request);
    }
}
