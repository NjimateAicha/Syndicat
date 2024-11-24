<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create roles if they don't exist
        $roles = ['Résident', 'Propriétaire' , 'Manager', 'Admin', 'Super Admin', 'Manager principal'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create a user for each role
        $users = [
            [
                'name' => 'Résident',
                'prenom' => 'User',
                'phone' => '123456789',
                'email' => 'Résident@example.com',
                'password' => Hash::make('password'),
                'adress' => '123 Résident St',
                'Num_Immenble' => '1A',
                'Num_Appartement' => '101',
                'image' => null,
                'role' => 'Résident',
            ],
            [
                'name' => 'Propriétaire',
                'prenom' => 'User',
                'phone' => '123456789',
                'email' => 'Propriétaire@example.com',
                'password' => Hash::make('password'),
                'adress' => '12355 Résident St',
                'Num_Immenble' => '1A',
                'Num_Appartement' => '101',
                'image' => null,
                'role' => 'Propriétaire',
            ],
            [
                'name' => 'Manager',
                'prenom' => 'User',
                'phone' => '987654321',
                'email' => 'Manager@example.com',
                'password' => Hash::make('password'),
                'adress' => '456 Manager Rd',
                'Num_Immenble' => '2B',
                'Num_Appartement' => '202',
                'image' => null,
                'role' => 'Manager',
            ],
            [
                'name' => 'Admin',
                'prenom' => 'User',
                'phone' => '555555555',
                'email' => 'Admin@example.com',
                'password' => Hash::make('password'),
                'adress' => '789 Admin Blvd',
                'Num_Immenble' => '3C',
                'Num_Appartement' => '303',
                'image' => null,
                'role' => 'Admin',
            ],
            [
                'name' => 'Super Admin',
                'prenom' => 'User',
                'phone' => '111111111',
                'email' => 'Super Admin@example.com',
                'password' => Hash::make('password'),
                'adress' => '101 Super Admin Ln',
                'Num_Immenble' => '4D',
                'Num_Appartement' => '404',
                'image' => null,
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Manager Principal',
                'prenom' => 'User',
                'phone' => '222222222',
                'email' => 'Managerprincipal@example.com',
                'password' => Hash::make('password'),
                'adress' => '202 Manager Principal Ave',
                'Num_Immenble' => '5E',
                'Num_Appartement' => '505',
                'image' => null,
                'role' => 'Manager principal',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'prenom' => $userData['prenom'],
                'phone' => $userData['phone'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'adress' => $userData['adress'],
                'Num_Immenble' => $userData['Num_Immenble'],
                'Num_Appartement' => $userData['Num_Appartement'],
                'image' => $userData['image'],
                'residence_id' => 1
            ]);

            // Assign the role to the user
            $user->assignRole($userData['role']);
        }
    }
}
