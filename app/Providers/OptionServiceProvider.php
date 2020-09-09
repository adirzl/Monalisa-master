<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class OptionServiceProvider extends ServiceProvider
{
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
        if (\Illuminate\Support\Facades\Schema::connection(config('database.default'))->hasTable('opt_groups')) {
            $tmp = [];
            Cache::forget('options');
            $results = Cache::has('options') ?
                Cache::get('options') :
                Cache::rememberForever('options', function () { return \App\Models\Optgroup::all(); });

            if ($results) {
                foreach ($results as $result) {
                    $tmp[$result->name] = $result->option_values
                        ->mapWithKeys(function ($item, $key) { return [$item['key'] => $item['value']]; })
                        ->toArray();
                }

                foreach ($tmp as $key => $value) {
                    \Illuminate\Support\Facades\View::share($key, $value);
                    \Illuminate\Support\Facades\Config::set('options.' . $key, $value);
                }
            }
        }
    }
}
