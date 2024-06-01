<?php

namespace App\Repositories\Fornecedor;

use App\DTO\ContatoDTO;
use App\DTO\FornecedorDTO;
use Illuminate\Support\Facades\DB;
use App\Models\Contato;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorEloquentORM implements FornecedorRepositoryInterface
{
    public function __construct(
        protected Fornecedor $model,
        protected Contato $contatoModel
    ) {
    }

    public function getAllFornecedores(Request $request)
    {
        return $this->model->get();
    }

    public function getAllFornecedoresPaginado(Request $request)
    {
        return $this->model->with('contato')->where(function ($query) use ($request) {
            !is_null($request->nome) ? $query->where('nome', 'ILIKE', '%' . $request->nome . '%') : '';
        })->paginate();
    }

    public function postFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO)
    {
        //DB::beginTransaction();


        try {
            $response = $this->model->create((array) $dto);

            $contato = $this->contatoModel->create((array) $contatoDTO);

            $response->contato()->associate($contato);

            $response->save();

            return (object) $response->toArray();
        } catch (\Exception $e) {
            //DB::rollBack();
            throw $e;
        }
    }

    public function putFornecedor(FornecedorDTO $dto, ContatoDTO $contatoDTO)
    {

        $fornecedor = $this->model->find($dto->id);
        if (!$fornecedor) {
            return null;
        }

        //DB::beginTransaction();

        try {


            if ($fornecedor->idcontato) {
                $contato = $this->contatoModel->find($fornecedor->idcontato);
                $contato->update((array) $contatoDTO);
            }
            //$fornecedor->contato->update((array) $contatoDTO);
            $fornecedor->update((array) $dto);

            return (object) $fornecedor->toArray();
        } catch (\Exception $e) {
            //DB::rollBack();

            throw $e;
        }
    }
}
