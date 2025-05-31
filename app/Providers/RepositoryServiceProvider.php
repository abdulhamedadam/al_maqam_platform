<?php

namespace App\Providers;

use App\Interfaces\Admin\EvaluationQuestionInterface;
use App\Interfaces\Admin\SectionInterface;
use App\Interfaces\BasicRepositoryInterface;
use App\Repositories\Admin\EvaluationQuestionRepository;
use App\Repositories\BasicRepository;
use App\Interfaces\Admin\StudentInterface;
use App\Interfaces\Admin\TeacherInterface;
use App\Repositories\Admin\SectionRepository;
use App\Repositories\Admin\StudentRepository;
use App\Repositories\Admin\TeacherRepository;
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
        $this->app->bind(TeacherInterface::class, TeacherRepository::class);
        $this->app->bind(SectionInterface::class, SectionRepository::class);
        $this->app->bind(EvaluationQuestionInterface::class, EvaluationQuestionRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
