<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services, with all the code that we need to inject and view and controller for clean and modularity
     *
     * @return void
     */
    public function boot()
    {
        //view composer service provider
        view()->composer('layouts.sidebar', function($view){
            $categories = Category::with(['posts' => function($query) {
                    $query->published();
            }])->orderBy('title', 'asc')->get();

            return $view->with('categories', $categories);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
