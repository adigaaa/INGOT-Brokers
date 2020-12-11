<?php

namespace App\Providers;

use App\Http\Controllers\UsersController;
use App\Repositories\Users\Contracts\UsersRepositoryContract;
use App\Repositories\Users\UsersRepository;
use App\Services\Users\Contracts\UserServiceContract;
use App\Services\Users\UsersService;
use Illuminate\Support\ServiceProvider;

class BindingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(UsersController::class)
            ->needs(UserServiceContract::class)
            ->give(UsersService::class);

        $this->app->when(UsersService::class)
            ->needs(UsersRepositoryContract::class)
            ->give(UsersRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
