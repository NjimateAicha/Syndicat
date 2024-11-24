<?php

namespace Database\Factories;

use App\Models\Residence;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidenceFactory extends Factory
{
    protected $model = Residence::class;

    public function definition()
    {
        return [
            'nomResidence' => $this->faker->company, // Generates a random company name
            'titre_regelement' => $this->faker->company,
            'description' => $this->faker->company
        ];
    }
}
