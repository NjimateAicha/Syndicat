<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Residence;
use App\Models\Reclamation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReclamationFactory extends Factory
{
    protected $model = Reclamation::class;

    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['nuisance', 'sinistre']), // Randomly choose between 'nuisance' or 'sinistre'
            'titre' => $this->faker->sentence, // Generates a random sentence for title
            'description' => $this->faker->paragraph, // Generates a random paragraph
            'image' => $this->faker->imageUrl(640, 480, 'abstract'), // Generates a random image URL
            'lieu' => $this->faker->address, // Generates a random address
            'user_id' => User::factory(), // Generates a related user
            'residence_id' => Residence::factory(), // Generates a related residence
        ];
    }
}
