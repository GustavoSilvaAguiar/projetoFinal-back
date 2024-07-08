<?php

namespace App\Repositories\InfoNutricional;

use App\DTO\InfoNutricionalDTO;
use Illuminate\Http\Request;

interface InfoNutricionalRepositoryInterface {
    public function getInfoNutricional(string $id);
    public function postInfoNutricional(InfoNutricionalDTO $dto);
    public function putInfoNutricional(InfoNutricionalDTO $dto);
}