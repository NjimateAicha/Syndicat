<?php
namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
        public function updateParameters(Request $request)
    {
        // Validate the input, including the logo file
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Allow logo to be optional
            'app_name' => 'nullable|string|max:255', // Add validation for app_name
            'copyright' => 'nullable|string|max:255', // Add validation for copyright
            'facebook_link' => 'nullable|url|max:255', // Add validation for social media links
            'twitter_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'instagram_link' => 'nullable|url|max:255',
            'lang_file' => 'nullable|file|mimes:json',
            
        ]);
        if ($request->hasFile('lang_file')) { 
            // Récupérer le fichier téléchargé
            $file = $request->file('lang_file');
        
            // Stocker le fichier dans 'storage/app/public/json'
            $pathInStorage = $file->store('json', 'public');
        
            // Extraire le nom du fichier sans l'extension (.json)
            $locale = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        
            // Copier le fichier dans 'resources/lang'
            $file->move(resource_path('lang'), $locale . '.json');
        
            // Optionnel : définir la langue dans la session
            session(['locale' => $locale]);
        
            // Optionnel : modifier dynamiquement la locale de l'application
            app()->setLocale($locale);
        
            // Retourner une réponse de succès
            return back()->with('success', 'Le fichier de langue a été téléchargé et le locale a été défini.');
        }
        
        // if ($request->hasFile('lang_file')) {
        //     $file = $request->file('lang_file');
        //     $jsonContent = file_get_contents($file); // Read the file contents

        //     // Store the JSON content in the parameter table
        //     $parameter = Parameter::firstOrCreate();
        //     $parameter->json_file_content = $jsonContent; // Store the actual content
        //     $parameter->save();

        //     // Optionally, set the locale based on the uploaded file
        //     $locale = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        //     session(['locale' => $locale]);
        // }

        // First, retrieve or create the Parameter instance
        $parameter = Parameter::firstOrCreate();

        // Check if the request has the 'logo' file
        if ($request->hasFile('logo')) {
            // Get the file information and store the new logo
            $file = $request->file('logo');
            $logoPath = $file->store('logo', 'public'); // Store the file in the 'public/logo' directory

            // Delete the old logo if it exists
            if ($parameter->logo && Storage::disk('public')->exists($parameter->logo)) {
                Storage::disk('public')->delete($parameter->logo); // Delete the old logo
            }

            // Update the parameter record with the new logo path
            $parameter->logo = $logoPath;
        }

        // Only update the fields if they are not null in the request
        if (!is_null($request->input('app_name'))) {
            $parameter->app_name = $request->input('app_name');
        }

        if (!is_null($request->input('copyright'))) {
            $parameter->copyright = $request->input('copyright');
        }

        if (!is_null($request->input('facebook_link'))) {
            $parameter->facebook_link = $request->input('facebook_link');
        }

        if (!is_null($request->input('twitter_link'))) {
            $parameter->twitter_link = $request->input('twitter_link');
        }

        if (!is_null($request->input('linkedin_link'))) {
            $parameter->linkedin_link = $request->input('linkedin_link');
        }

        if (!is_null($request->input('instagram_link'))) {
            $parameter->instagram_link = $request->input('instagram_link');
        }


        // Save the parameter instance
        $parameter->save();

        // Optionally, return a success response
        return back()->with('success','paramters saved');
    }
    
}
