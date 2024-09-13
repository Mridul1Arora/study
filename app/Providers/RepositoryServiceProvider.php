<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contract\LeadRepositoryInterface;
use App\Contract\CallLogRepositoryInterface;
use App\Repositories\LeadRepository;
use App\Repositories\CallLogRepository;
use App\Contract\NotesRepositoryInterface;
use App\Repositories\NotesRepository;


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
        $this->app->bind(CallLogRepositoryInterface::class, CallLogRepository::class);
        $this->app->bind(NotesRepositoryInterface::class, NotesRepository::class);
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
