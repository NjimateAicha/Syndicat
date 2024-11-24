<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Document::class;
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['type1', 'type2']),
            'titre' => $this->faker->title(),
            'fichier'=> "https://www.orimi.com/pdf-test.pdf",
            'commentaire'  => $this->faker->sentence(),
            'residence_id'=>2

        ];
    }
}
