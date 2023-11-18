<?php

namespace App\Providers;

use App\Features\AdminTagGroupFeature;
use App\Features\ProductParameters;
use App\Features\ProductVariationsFeature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Laravel\Pennant\Feature;

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
        Model::preventSilentlyDiscardingAttributes(!$this->app->isProduction());

        Feature::define('product-variations', fn () => (new ProductVariationsFeature())->resolve());

        Feature::define('product-parameters', fn (string $parameter) => (new ProductParameters())->resolve($parameter));

        Feature::define('admin-tag-group', fn () => (new AdminTagGroupFeature())->resolve());
    }
}
