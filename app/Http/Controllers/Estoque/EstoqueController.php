<?php

namespace App\Http\Controllers\Estoque;

use App\Http\Controllers\Controller;
use App\Http\Requests\EstoquePostUpdateRequest;
use App\Services\EstoqueService;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function __construct(
        protected EstoqueService $service
    ) {
    }

    public function getEstoque(Request $request)
    {
        return $this->service->getEstoque($request);
    }

    public function postEstoque(EstoquePostUpdateRequest $request)
    {
        return $this->service->postEstoque($request);
    }
}
