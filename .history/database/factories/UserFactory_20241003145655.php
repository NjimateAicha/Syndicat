<?php

namespace Database\Factories;

use App\Models\Residence;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = null;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Define available roles
        $roles = ['Résident', 'Manager', 'Manager principal', 'Admin', 'superAdmin'];

        return [
            'name' => $this->faker->lastName, // Generates a random last name
            'prenom' => $this->faker->firstName, // Generates a random first name
            'phone' => $this->faker->phoneNumber, // Generates a random phone number
            'email' => $this->faker->unique()->safeEmail, // Generates a unique email
            'password' => Hash::make('password'), // Hashed password (you can change the default)
            'adress' => $this->faker->address, // Generates a random address
            'Num_Immenble' => $this->faker->buildingNumber, // Generates a random building number
            'Num_Appartement' => $this->faker->randomDigitNotNull, // Generates a random apartment number
            'image' => $this->faker->imageUrl(640, 480, 'people'), // Generates a random image URL
            'residence_id' => Residence::inRandomOrder()->first()->id, // Assigns a random residence
        ];
    }

    /**
     * After creating a user, assign a role.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            // Define available roles
            $roles = ['Résident', 'Manager', 'Manager principal', 'Admin', 'superAdmin'];

            // Assign a random role to the user
            $randomRole = $roles[array_rand($roles)];
            $user->assignRole($randomRole);
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}