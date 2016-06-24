<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Acme\Repositories\PostTypeRepositoryInterface',
            'App\Acme\Repositories\PostTypeRepository'
        );

        $this->app->bind(
            'App\Acme\Repositories\PostRepositoryInterface',
            'App\Acme\Repositories\PostRepository'
        );

        $this->app->bind(
            'App\Acme\Repositories\CategoryRepositoryInterface',
            'App\Acme\Repositories\CategoryRepository'
        );
    }
}
