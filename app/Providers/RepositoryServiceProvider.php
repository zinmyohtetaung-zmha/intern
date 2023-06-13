<?php

namespace App\Providers;

use App\Interfaces\ClassInterface;
use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Interfaces\TeacherInterface;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\UserInterface;
use App\Repositories\ClassRepository;
use App\Repositories\SchoolRepository;
use App\Repositories\StudentRepository;
use App\Repositories\TeacherRepository;
use App\Repositories\UserRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    public $bindings = [
        UserInterface::class => UserRepository::class,
        SchoolInterface::class => SchoolRepository::class,
        StudentInterface::class => StudentRepository::class,
        TeacherInterface::class => TeacherRepository::class,
        ClassInterface::class => ClassRepository::class

    ];
    
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(SchoolInterface::class, SchoolRepository::class);
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(TeacherInterface::class, TeacherRepository::class);
        $this->app->bind(ClassInterface::class, ClassRepository::class);


    }
}