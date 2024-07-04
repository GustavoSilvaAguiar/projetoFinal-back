<?php

namespace App\Repositories\InfoNutricional;

use App\DTO\InfoNutricionalDTO;
use App\Models\InfoNutricional;
use Error;
use Illuminate\Http\Request;

class InfoNutricionalEloquentORM implements InfoNutricionalRepositoryInterface
{
    public function __construct(
        protected InfoNutricional $model
    ) {
    }

    public function getInfoNutricional(string $id)
    {
        try {
            return $this->model->where('idproduto', $id)->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Not Found'], 404);
        }
    }

    public function postInfoNutricional(InfoNutricionalDTO $dto)
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }

    public function putInfoNutricional(InfoNutricionalDTO $dto)
    {
        try {
            $info = $this->model->find($dto->id);

            $info->update((array) $dto);

            return (object) $info->toArray();
        } catch (Error $error) {
            return response()->json($error);
        }
    }
}
