<?php

namespace Packages\Strainer\Providers;

use Illuminate\Support\ServiceProvider;
use Packages\Strainer\Console\Commands\MakeFilter;

class StrainerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeFilter::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
