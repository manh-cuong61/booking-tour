<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $models = [
        'Category',
        'Tag',
        'Article',
        'Tour',
        'TourGuide',
        'Hotel',
        'User',
        'Discount',
        'Review',
        'Transition'
    ];
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach ($this->models as $model) {
            $folder = "App\Repositories\\$model";
            $interface = "$folder\\{$model}RepositoryInterface";
            $eloquent = "$folder\\{$model}Repository";
            app()->singleton($interface, $eloquent);
        }
    }
}