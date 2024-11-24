<?php

// namespace App\Providers;

// use App\Models\Parameter;
// use App\Models\Residence;
// use Illuminate\Support\Facades\View;
// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\App;
// use Illuminate\Support\Facades\Session;

// class AppServiceProvider extends ServiceProvider
// {
//     /**
//      * Register any application services.
//      */
//     public function register(): void
//     {
//         //
//     }

//     /**
//      * Bootstrap any application services.
//      */
//     public function boot()
//     {
//         App::setLocale(Session::get('locale', config('app.locale')));

//         // Retrieve the parameters from the database (you can limit to one or handle multiple rows)
//         $parameters = Parameter::first();

//         // Guard if there are no parameters
//         if ($parameters) {
//             // Share the parameters with all views if found
//             View::share('appParameters', $parameters);
//         } else {
//             // Optionally, you can share default values if no parameters exist
//             View::share('appParameters', (object)[
//                 'logo' => 'default-logo.png', // Default logo path
//                 'app_name' => 'Default App Name' // Default app name
//             ]);
//         }

//     }
// }
namespace App\Providers;

use App\Models\Parameter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;

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

        // Vérifie si la table 'parameters' existe avant d'exécuter la requête
        if (Schema::hasTable('parameters')) {
            // Récupère les paramètres s'ils existent
            $parameters = Parameter::first();

            if ($parameters) {
                // Partage les paramètres avec toutes les vues
                View::share('appParameters', $parameters);
            } else {
                // Partage des valeurs par défaut si aucun paramètre n'est trouvé
                View::share('appParameters', (object)[
                    'logo' => 'default-logo.png',
                    'app_name' => 'Default App Name',
                ]);
            }
        } else {
            // Si la table n'existe pas, partage des valeurs par défaut
            View::share('appParameters', (object)[
                'logo' => 'default-logo.png',
                'app_name' => 'Default App Name',
            ]);
        }
    }
}
