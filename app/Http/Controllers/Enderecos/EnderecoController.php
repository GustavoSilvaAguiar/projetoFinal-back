<?php

namespace App\Http\Controllers\Enderecos;

use App\Http\Controllers\Controller;
use App\Services\EnderecoService;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function __construct(protected EnderecoService $service)
    {
    }

    public function getEnderecos()
    {
        $enderecos = $this->service->getEnderecos();

        return $enderecos;
    }
}
