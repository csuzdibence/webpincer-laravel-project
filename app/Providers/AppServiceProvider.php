<?php

namespace App\Providers;

use App\Models\Restaurant;
use App\Models\Comment;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

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
        Relation::enforceMorphMap([

            'restaurant' => Restaurant::class,
            'reply' => Comment::class,
        ]);
    }
}
