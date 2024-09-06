<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contract\LeadRepositoryInterface;
use App\Repositories\LeadRepository;

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
        $this->app->bind(LeadRepositoryInterface::class, LeadRepository::class);
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
