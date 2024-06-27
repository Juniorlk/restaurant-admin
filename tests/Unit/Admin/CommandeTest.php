<?php

namespace Tests\Unit\Admin;

use App\Models\User;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Plat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;



class CommandeTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function an_admin_can_view_commandes()
    {
        $admin = User::factory()->create();
        $client = Client::factory()->create();
        $commande = Commande::factory()->create(['Id_Client' => $client->Id_Client]);

        $this->actingAs($admin)->get('/commande')
             ->assertStatus(200)
             ->assertSee($commande->Id_Commande);
    }

    #[Test]
    public function an_admin_can_update_a_commande()
    {
        $admin = User::factory()->create();
        $client = Client::factory()->create();
        $commande = Commande::factory()->create(['Id_Client' => $client->Id_Client]);

        $nouveauStatut = $commande->Statut == 1 ? 1 : 0;

        $response = $this->actingAs($admin)->put("/commandes/{$commande->Id_Commande}", [
            'Statut' => $nouveauStatut,
        ]);

        $response->assertStatus(302); // assuming there's a redirect
        $this->assertDatabaseHas('commandes', [
            'Id_Commande' => $commande->Id_Commande,
            'Statut' => $nouveauStatut,
        ]);
    }

    public function test_commande_has_fillable_attributes()
    {
        $commande = new Commande();

        $this->assertEquals([
            'Id_Client',
            'Date_heure',
            'Mode_paiement',
            'Statut',
        ], $commande->getFillable());
    }

    public function test_commande_belongs_to_client()
    {
        $client = Client::factory()->create();
        $commande = Commande::factory()->create(['Id_Client' => $client->Id_Client]);

        $this->assertInstanceOf(Client::class, $commande->client);
    }

    public function test_commande_belongs_to_many_plats()
    {
        $commande = Commande::factory()->create();
        $plat = Plat::factory()->create();
        $commande->plats()->attach($plat->Id_Plat, ['quantite' => 1]);

        $this->assertTrue($commande->plats->contains($plat));
    }
}
