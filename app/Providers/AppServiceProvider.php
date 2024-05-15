<?php

namespace App\Providers;

use App\Repositories\{UserRepositoryInterface, UserEloquentORM};
use App\Repositories\Endereco\{EnderecoRepositoryInterface, EnderecoEloquentORM};
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
