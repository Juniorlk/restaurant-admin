<?php

namespace Database\Factories;

use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plat>
 */
class PlatFactory extends Factory
{
    protected $model = Plat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Id_Categorie' => Categorie::factory(),
            'Nom' => $this->faker->word,
            'Description' => $this->faker->sentence,
            'Prix' => $this->faker->numberBetween(1000, 10000),
            'Photos' => $this->faker->imageUrl(),
            'Allergenes' => $this->faker->words(3, true),
            'Type_plat' => $this->faker->word,
        ];
    }
}
