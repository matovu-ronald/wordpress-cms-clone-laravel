<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.sidebar', function ($view) {
            $categories = Category::with(['posts' => function ($query) {
                $query->published();
            }])->orderBy('title', 'asc')->get();

            return $view->with('categories', $categories);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
