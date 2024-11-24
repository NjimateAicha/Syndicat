<?php

namespace App\Providers;

use App\Models\Parameter;
use App\Models\Residence;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

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
    public function boot()
    {
        App::setLocale(Session::get('locale', config('app.locale')));

        // Check if the parameters table exists before querying
        if (Schema::hasTable('parameters')) {
            // Retrieve the parameters from the database (you can limit to one or handle multiple rows)
            $parameters = Parameter::first();

            // Guard if there are no parameters
            if ($parameters) {
                // Share the parameters with all views if found
                View::share('appParameters', $parameters);
            } else {
                // Optionally, you can share default values if no parameters exist
                View::share('appParameters', (object)[
                    'logo' => 'default-logo.png', // Default logo path
                    'app_name' => 'Default App Name' // Default app name
                ]);
            }
        } else {
            // Share default values if the table does not exist
            View::share('appParameters', (object)[
                'logo' => 'default-logo.png', // Default logo path
                'app_name' => 'Default App Name' // Default app name
            ]);
        }

    }
}