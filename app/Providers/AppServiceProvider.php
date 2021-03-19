<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

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
        Collection::macro('addIfNotNull', function ($element) {
            $collection = collect($this->items);
            if ($element != null) {
                $collection = $collection->push($element);
            }
            return $collection;
        });
    }
}
