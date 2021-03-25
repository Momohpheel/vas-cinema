<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class CinemaServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            'App\Repositories\CinemaRepositoryInterface',
            'App\Repositories\CinemaRepository'
        );
    }
}