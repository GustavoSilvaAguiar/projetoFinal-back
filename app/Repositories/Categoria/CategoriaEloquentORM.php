<?php

namespace App\Repositories\Categoria;

use App\DTO\CategoriaDTO;
use App\Http\Requests\CategoriaPostUpdateRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\Storage;
use stdClass;

class CategoriaEloquentORM implements CategoriaRepositoryInterface
{

    public function __construct(
        protected Categoria $model
    ) {
    }

    public function getAllCategorias()
    {
        $categorias = $this->model->get();

        foreach ($categorias as $categoria) {
            $categoria->img = $categoria->img ? asset(Storage::url($categoria->img)) : null;
        }

        return $categorias;
    }

    public function postCategoria(CategoriaDTO $dto): stdClass | null
    {
        //$this->model->img = $dto->img->file('');
        //$catagoriaImgName = time() . '_' . $dto->img->getClientOriginalName();

        $response = $this->model->create([
            'nome' => $dto->nome,
            'idusuario' => $dto->idusuario
        ]);

        $this->saveCategoriaPicture($response, $dto->img);


        return (object) $response->toArray();
    }

    public function saveCategoriaPicture($categoria, $img)
    {
        $fileName = 'categoria_picture_' . $categoria->id . '.' . $img->extension();
        $path = $img->storeAs('public/categoria_pictures', $fileName);

        $categoria->img = $path;
        // Atualizar o caminho da imagem no banco de dados
        $categoria->save();
    }

    public function deleteOldPicture($imgPath)
    {
        if ($imgPath && Storage::exists($imgPath)) {
            Storage::delete($imgPath);
        }
    }


    public function putCategoria(CategoriaDTO $dto)
    {
        $categoria = $this->model->find($dto->id);
        if (!$categoria) {
            return null;
        }

        $categoria->nome = $dto->nome;
        $categoria->idusuario = $dto->idusuario;

        // Verifica se há uma nova imagem a ser salva
        // Exclui a imagem existente, se houver
        if ($categoria->img) {
            $this->deleteOldPicture($categoria->img);

            // Salva a nova imagem ou executa qualquer lógica necessária
            $this->saveCategoriaPicture($categoria, $dto->img);
        }




        // Salva as alterações no objeto $categoria
        $categoria->save();

        return (object) $categoria->toArray();
    }
}
