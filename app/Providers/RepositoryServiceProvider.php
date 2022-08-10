<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Admin\CasesRepository::class, \App\Repositories\Admin\CasesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\HomeSettingRepository::class, \App\Repositories\HomeSettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\WebSettingRepository::class, \App\Repositories\WebSettingRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CaseRepository::class, \App\Repositories\CaseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CasesCateRepository::class, \App\Repositories\CasesCateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProductCateRepository::class, \App\Repositories\ProductCateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ArticleCateRepository::class, \App\Repositories\ArticleCateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\JobRepository::class, \App\Repositories\JobRepositoryEloquent::class);
        //:end-bindings:
    }
}
