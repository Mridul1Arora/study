<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contract\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Contract\RoleRepositoryInterface;
use App\Repositories\RoleRepository;
use App\Contract\AttachmentRepositoryInterface;
use App\Repositories\AttachmentRepository;
use App\Contract\UniversityRepositoryInterface;
use App\Repositories\UniversityRepository;
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
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class); 
        $this->app->bind(AttachmentRepositoryInterface::class, AttachmentRepository::class);
        $this->app->bind(UniversityRepositoryInterface::class, UniversityRepository::class);  
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
