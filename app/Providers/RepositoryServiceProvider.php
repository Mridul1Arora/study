<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contract\RoleRepositoryInterface;
use App\Repositories\RoleRepository;





class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);  
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
