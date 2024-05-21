<?php

namespace App\Providers;

use App\Repositories\{UserRepositoryInterface, UserEloquentORM};
use App\Repositories\Categoria\CategoriaEloquentORM;
use App\Repositories\Categoria\CategoriaRepositoryInterface;
use App\Repositories\Endereco\{EnderecoRepositoryInterface, EnderecoEloquentORM};
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
