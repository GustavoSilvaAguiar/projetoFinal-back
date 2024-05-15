<?php

namespace App\Services;

use App\Repositories\Endereco\EnderecoRepositoryInterface;

class EnderecoService
{

    public function __construct(
        protected EnderecoRepositoryInterface $repository
    ) {
    }

    public function getEnderecos()
    {
        return $this->repository->getEnderecos();
    }
}
