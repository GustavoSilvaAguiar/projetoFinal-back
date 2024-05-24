<?php

namespace App\Repositories\Categoria;

use App\DTO\CategoriaDTO;
use App\Http\Requests\CategoriaPostUpdateRequest;
use App\Models\Categoria;
use stdClass;

class CategoriaEloquentORM implements CategoriaRepositoryInterface
{

    public function __construct(
        protected Categoria $model
    ) {
    }

    public function getAllCategorias()
    {
        return $this->model->get()->toArray();
    }

    public function postCategoria(CategoriaDTO $dto): stdClass | null
    {
        //$this->model->img = $dto->img->file('');
        //$catagoriaImgName = time() . '_' . $dto->img->getClientOriginalName();
        
        $response = $this->model->create([
            'nome'=> $dto->nome,
            'idusuario'=> $dto->idusuario
        ]);

        if($dto->img) {
            $this->saveCategoriaPicture($response, $dto->img);
        }

        return (object) $response->toArray();
    }

    public function saveCategoriaPicture( $categoria, $img) {
        $fileName = 'categoria_picture_' . $categoria->id . '.' . $img->extension();
        $path = $img->storeAs('public/profile_pictures', $fileName);

        // Atualizar o caminho da imagem no banco de dados
        $categoria->update(['profile_picture' => $path]);
    }
}
