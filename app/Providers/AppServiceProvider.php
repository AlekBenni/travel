<?php

namespace App\Providers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        view()->composer('layouts.sidebar', function($view){
            $view->with('popular_posts', Post::orderBy('view', 'desc')->limit(3)->get());
            $view->with('authors', Author::withCount('posts')->orderBy('posts_count', 'desc')->limit(3)->get());
            $view->with('popular_tags', Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(5)->get());
            $view->with('offers', Offer::orderBy('id', 'desc')->get());
        });

        view()->composer('layouts.footer', function($view){
            $view->with('thurs', Post::where('category_id', 6)->orderBy('view', 'desc')->limit(3)->get());
            $view->with('posts', Post::where('category_id', 5)->orderBy('view', 'desc')->limit(3)->get());
            $view->with('popular_tags', Tag::withCount('posts')->orderBy('posts_count', 'desc')->limit(5)->get());
        });

        view()->composer('layouts.navbar', function($view){
            $view->with('categories', Category::orderBy('id')->get());
        });
    }
}
