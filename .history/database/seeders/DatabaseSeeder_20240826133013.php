<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Document;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Residence;
use App\Models\Commentaire;
use App\Models\Reclamation;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // Create a default Admin user
       
        User::create([
            'name' => 'Admin',
            'prenom' => 'User',
            'phone' => '1234567890',
            'email' => 'Admin@example.com',
            'password' => Hash::make('password123'), // Use a secure password
            'adress' => '123 Admin St',
            'Num_Immenble' => '1',
            'Num_Appartement' => '101',
            'image' => null, // You can provide a path to an image if needed
            'remember_token' => null // Optional
        ]);


        // Create 10 residences
        Residence::factory(10)->create();

        // // // Create 100 users
        // User::factory(100)->create();

        // // Create 30 reclamations
        // // Reclamation::factory(30)->create();

        // // Document::factory(10)->create();

    }
}
