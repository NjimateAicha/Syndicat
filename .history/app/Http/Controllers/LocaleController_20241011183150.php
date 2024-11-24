<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class LocaleController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = $request->input('locale');

        if (in_array($locale, ['en', 'ar', 'fr', 'es', 'de', 'it'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return redirect()->back();
    }
    public function change(Request $request)
    {
        $locale = $request->input('locale');

        // Store the selected locale in the session
        Session::put('locale', $locale);

        // Change the application locale
        App::setLocale($locale);

        // Redirect back to the previous page or a specific route
        return redirect()->back();
    }
    public function showLanguageForm()
    {
        // Récupère tous les fichiers de langues depuis le répertoire resources/lang
        $localeFiles = File::files(resource_path('lang')); 
        $locales = [];
    
        foreach ($localeFiles as $file) {
            // Extrait uniquement les noms de fichiers sans l'extension
            $locales[] = pathinfo($file)['filename'];
        }
    
        // Utilisez dd pour vérifier le contenu de $locales
        dd($locales); // Cela arrêtera l'exécution et affichera le contenu de $locales
    
        // Retourne la vue avec les langues disponibles
        return view('components.layouts.navbar', compact('locales'));
    }
    

}
