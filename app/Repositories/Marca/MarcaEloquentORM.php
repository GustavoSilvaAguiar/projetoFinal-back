<?php

namespace App\Repositories\Marca;

use App\DTO\ContatoDTO;
use App\DTO\MarcaDTO;
use App\Models\Contato;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaEloquentORM implements MarcaRepositoryInterface
{

    public function __construct(
        protected Marca $model,
        protected Contato $contatoModel
    ) {
    }

    public function getAllMarcas(Request $request)
    {
        return $this->model->get();
    }

    public function getAllMarcasPaginado(Request $request)
    {
        return $this->model->where(function ($query) use ($request) {
            !is_null($request->nome) ? $query->where('nome', 'ILIKE', '%' . $request->nome . '%') : '';
        })->paginate();
    }

    public function postMarca(MarcaDTO $dto)
    {
        $response = $this->model->create((array) $dto);

        return (object) $response->toArray();
    }

    public function putMarca(MarcaDTO $dto)
    {
        $marca = $this->model->find($dto->id);

        if (!$marca) {
            return null;
        }

        $marca->update((array) $dto);

        return (object) $marca->toArray();
    }
}
