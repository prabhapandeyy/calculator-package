<?php

namespace LP\Calculator;

use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('LP\Calculator\CalculatorController');
        $this->app->make('LP\Calculator\InvoiceController');
        $this->app->make('LP\Calculator\InventoryController');
        $this->app->make('LP\Calculator\InvoiceCategoryController');
        $this->app->make('LP\Calculator\PaymentMethodController');
        $this->loadViewsFrom(__DIR__ . DIRECTORY_SEPARATOR .'views','calculator');
        $this->loadMigrationsFrom(__DIR__ . DIRECTORY_SEPARATOR .'database/migrations');
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';
    }
}
