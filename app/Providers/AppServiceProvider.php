<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        // Gates
        // Gate::define('create-post', function ($user) {
        //     return in_array($user->role, ['author', 'admin']);
        // });
        // Gate::define('delete-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });
    }
}
