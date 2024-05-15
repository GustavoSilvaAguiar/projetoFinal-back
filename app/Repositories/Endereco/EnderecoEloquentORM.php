<?php

namespace App\Repositories\Endereco;

use App\Models\Endereco;

class EnderecoEloquentORM implements EnderecoRepositoryInterface
{

    public function __construct(
        protected Endereco $model
    ) {
    }

    public function getEnderecos(): array
    {
        return $this->model->get()->toArray();
    }
}
