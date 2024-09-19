<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\MongoActivity;
use Spatie\Activitylog\ActivitylogServiceProvider;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class CustomActivityLogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SpatieActivity::class, MongoActivity::class);
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
