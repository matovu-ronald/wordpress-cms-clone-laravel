<?php

namespace App\Http\View\Composer;

use App\Post;
use App\Category;
use Illuminate\View\View;

class BlogComposer  
{
    public function compose(View $view)
    {
        $this->composeCategories($view);
        $this->composePopularPosts($view);   
    }

    private function composeCategories(View $view)
    {
        $categories = Category::with(['posts' => function ($query) {
                    $query->published();
        }])->orderBy('title', 'asc')->get(); 
          
        $view->with('categories', $categories);
    }

    private function composePopularPosts(View $view)
    {
        $popularPosts = Post::published()->popular()->take(3)->get();
        $view->with('popularPosts', $popularPosts);
    }
}
