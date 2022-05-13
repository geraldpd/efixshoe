<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Blueprint::macro("nativeTimestamps", function ($precision = 0) {
            $this->timestamp("created at", $precision)
                ->useCurrent();

            $this->timestamp("updated at", $precision)
                ->useCurrent()
                ->useCurrentOnUpdate();

        });
    }

}



