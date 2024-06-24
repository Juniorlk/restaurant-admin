<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'Nom' => $this->faker->lastName,
            'Prenom' => $this->faker->firstName,
            'AdresseMail' => $this->faker->unique()->safeEmail,
            'MotDePasse' => bcrypt('password'), // MotDePasse crypté
            'Telephone' => $this->faker->phoneNumber,
            // 'Status' => $this->faker->randomElement(['inactif', 'actif']),
        ];
    }
}
