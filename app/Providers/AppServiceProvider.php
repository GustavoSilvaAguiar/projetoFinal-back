<?php

namespace App\Providers;

use App\Repositories\{UserRepositoryInterface, UserEloquentORM};
use App\Repositories\Categoria\CategoriaEloquentORM;
use App\Repositories\Categoria\CategoriaRepositoryInterface;
use App\Repositories\Charts\ChartsEloquentORM;
use App\Repositories\Charts\ChartsRepositoryInterface;
use App\Repositories\Cidade\CidadeEloquentORM;
use App\Repositories\Cidade\CidadeRepositoryInterface;
use App\Repositories\Endereco\{EnderecoRepositoryInterface, EnderecoEloquentORM};
use App\Repositories\Estoque\EstoqueEloquentORM;
use App\Repositories\Estoque\EstoqueRepositoryInterface;
use App\Repositories\Fornecedor\FornecedorEloquentORM;
use App\Repositories\Fornecedor\FornecedorRepositoryInterface;
use App\Repositories\InfoNutricional\InfoNutricionalEloquentORM;
use App\Repositories\InfoNutricional\InfoNutricionalRepositoryInterface;
use App\Repositories\Marca\MarcaEloquentORM;
use App\Repositories\Marca\MarcaRepositoryInterface;
use App\Repositories\Produto\ProdutoEloquentORM;
use App\Repositories\Produto\ProdutoRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserEloquentORM::class
        );

        $this->app->bind(
            EnderecoRepositoryInterface::class,
            EnderecoEloquentORM::class
        );

        $this->app->bind(
            CategoriaRepositoryInterface::class,
            CategoriaEloquentORM::class
        );

        $this->app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoEloquentORM::class
        );

        $this->app->bind(
            MarcaRepositoryInterface::class,
            MarcaEloquentORM::class
        );

        $this->app->bind(
            EstoqueRepositoryInterface::class,
            EstoqueEloquentORM::class
        );

        $this->app->bind(
            FornecedorRepositoryInterface::class,
            FornecedorEloquentORM::class
        );

        $this->app->bind(
            CidadeRepositoryInterface::class,
            CidadeEloquentORM::class
        );

        $this->app->bind(
            InfoNutricionalRepositoryInterface::class,
            InfoNutricionalEloquentORM::class
        );

        $this->app->bind(
            ChartsRepositoryInterface::class,
            ChartsEloquentORM::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
