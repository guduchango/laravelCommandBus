<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use App\Modules\Users\Repositories\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
