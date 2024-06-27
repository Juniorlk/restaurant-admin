<?php


namespace Database\Factories;

use App\Models\Commande;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    public function definition()
    {
        return [
            'Id_Client' => Client::factory(),
            'Date_heure' => $this->faker->dateTime,
            'Mode_paiement' => $this->faker->randomElement(['carte', 'paypal', 'chèque']),
            'Statut' => $this->faker->randomElement([0, 1]), // 0 pour en attente, 1 pour complété
            'Prix' => $this->faker->randomFloat(2, 10000, 20000),
        ];
    }
}

