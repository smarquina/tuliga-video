<?php

namespace App\Providers;

use App\Http\Services\Film\FilmService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        \Schema::defaultStringLength(191);

        $this->app->bind(
            'App\Http\Repositories\Film\FilmRepositoryInterface',
            'App\Http\Repositories\Film\FilmRepository'
        );

        $this->app->bind('FilmService', function ($app) {
            return new FilmService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }
}
