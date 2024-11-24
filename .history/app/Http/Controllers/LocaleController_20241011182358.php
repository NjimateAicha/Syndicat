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
    $localeFiles = File::files(resource_path('lang')); // Récupère tous les fichiers de langues
    $locales = [];

    foreach ($localeFiles as $file) {
        // Extrait uniquement les noms de fichiers sans l'extension
        $locales[] = pathinfo($file)['filename'];
    }

    return view('components', compact('locales'));
}

}
