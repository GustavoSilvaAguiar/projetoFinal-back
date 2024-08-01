<?php

namespace App\Http\Controllers\Charts;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class ChartsController extends Controller
{
    public function __construct(
        protected ChartsService $service
    ) {
    }

    public function getBestSellers()
    {
        return $this->service->getBestSellers();
    }

    public function getBestCategorias()
    {
        return $this->service->getBestCategorias();
    }
}
