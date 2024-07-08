<?php

namespace App\Services;

use App\DTO\InfoNutricionalDTO;
use App\Repositories\InfoNutricional\InfoNutricionalRepositoryInterface;
use Illuminate\Http\Request;

class InfoNutricionalService
{
    public function __construct(
        protected InfoNutricionalRepositoryInterface $repository
    ) {
    }

    public function getInfoNutricional(string $id)
    {
        return $this->repository->getInfoNutricional($id);
    }

    public function postInfoNutricional(InfoNutricionalDTO $dto) {
        return $this->repository->postInfoNutricional($dto);

    }

    public function putInfoNutricional(InfoNutricionalDTO $dto) {
        return $this->repository->putInfoNutricional($dto);
    }
}
