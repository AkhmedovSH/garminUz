<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('posts', 'App\Policies\PostPolicy');
        Gate::define('posts.tag', 'App\Policies\PostPolicy@tag');
        Gate::define('posts.category', 'App\Policies\PostPolicy@category');
        Gate::define('posts.comment', 'App\Policies\PostPolicy@comment');
        Gate::define('posts.crud', 'App\Policies\PostPolicy@crud');

        Gate::resource('books', 'App\Policies\BookPolicy');
        Gate::define('books.bcategory', 'App\Policies\BookPolicy@bcategory');
        Gate::define('books.crud', 'App\Policies\BookPolicy@crud');


        Gate::resource('comments', 'App\Policies\CommentPolicy');
        Gate::define('comments.crud', 'App\Policies\CommentPolicy@crud');


        Gate::resource('solutions', 'App\Policies\SolutionPolicy');
        Gate::define('solutions.access', 'App\Policies\SolutionPolicy@access');
        Gate::define('solutions.crud', 'App\Policies\SolutionPolicy@crud');

        Gate::resource('users', 'App\Policies\UsersPolicy');
        Gate::define('users.crud', 'App\Policies\UsersPolicy@crud');
    }
}
