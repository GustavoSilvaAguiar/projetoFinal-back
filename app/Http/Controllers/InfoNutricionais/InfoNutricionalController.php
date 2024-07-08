<?php

namespace App\Http\Controllers\InfoNutricionais;

use App\DTO\InfoNutricionalDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\InfoNutricionalRequest;
use App\Services\InfoNutricionalService;
use Illuminate\Http\Request;

class InfoNutricionalController extends Controller
{
    public function __construct(
        protected InfoNutricionalService $service
    ) {
    }

    public function getInfoNutricional(Request $request)
    {
        return $this->service->getInfoNutricional($request->id);
    }

    public function postInfoNutricional(InfoNutricionalRequest $request) {
        return $this->service->postInfoNutricional(InfoNutricionalDTO::makeFromRequest($request));
    }

    public function putInfoNutricional(InfoNutricionalRequest $request) {
        return $this->service->putInfoNutricional(InfoNutricionalDTO::makeFromRequest($request));
    }
}
