<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::model('category', Category::class, function (string $categoryName){
            return Category::query()->where('slug', $categoryName)->first();
        });

        View::creator('*', function($view) {
            $view->with('menu_categories', Category::query()->where('parent_id', null)->with('children')->get());
        });

        if ($this->app->environment('TELESCOPE_ENABLED')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }
}
