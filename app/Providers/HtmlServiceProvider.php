<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends \Collective\Html\HtmlServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
//    public function register()
//    {
//        //
//    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    protected function registerHtmlBuilder()
    {
//        $this->app->singleton('html', function ($app) {
//            return new \App\Html\HtmlBuilder($app['url'], $app['view']);
//        });
    }
}
