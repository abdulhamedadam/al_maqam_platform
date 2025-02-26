<?php

namespace App\Providers;

use App\Interfaces\BasicRepositoryInterface;
use App\Repositories\BasicRepository;
use App\Interfaces\Admin\StudentInterface;
use App\Repositories\Admin\StudentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BasicRepositoryInterface::class, BasicRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
