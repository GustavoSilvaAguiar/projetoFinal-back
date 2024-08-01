<?php

namespace App\Services;

use App\Repositories\Charts\ChartsRepositoryInterface;

class ChartsService {
    public function __construct(
        protected ChartsRepositoryInterface $repository
    )
    {

    }

    public function getBestSellers() {
        return $this->repository->getBestSellers();
    }

    public function getBestCategorias() {
        return $this->repository->getBestCategorias();
    }
}
