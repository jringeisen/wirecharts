<?php

namespace Jringeisen\WireCharts;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class WireChartsServiceProvider extends ServiceProvider
{

    public function reigster()
    {
        //
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'wirecharts');

        if ($this->app->runningInConsole()) {
            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/wirecharts'),
            ], 'views');

        }

        Livewire::component('line-chart', LineChart::class);
    }
}
