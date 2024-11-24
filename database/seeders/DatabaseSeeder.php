<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Document;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Residence;
use App\Models\Commentaire;
use App\Models\Reclamation;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {




    Residence::factory()->count(10)->create();
    $this->call([
        UserSeeder::class,
    ]);
    // \App\Models\User::factory(50)->create();


}
}
