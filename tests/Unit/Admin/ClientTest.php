<?php

namespace Tests\Unit\Admin;


use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;


class ClientTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_create_a_client()
    {
        // Créer un client
        $client = Client::factory()->create();

        // Vérifier que le client a été créé
        $this->assertDatabaseHas('clients', [
            'Id_Client' => $client->Id_Client,
        ]);
    }

    #[Test]
    public function it_can_update_a_client()
    {
        // Créer un client
        $client = Client::factory()->create();

        // Mettre à jour le client
        $client->update([
            'Nom' => 'Nouveau Nom',
        ]);

        // Vérifier que le client a été mis à jour
        $this->assertDatabaseHas('clients', [
            'Id_Client' => $client->Id_Client,
            'Nom' => 'Nouveau Nom',
        ]);
    }

    #[Test]
    public function it_can_delete_a_client()
    {
        // Créer un client
        $client = Client::factory()->create();

        // Supprimer le client
        $client->delete();

        // Vérifier que le client a été supprimé
        $this->assertDatabaseMissing('clients', [
            'Id_Client' => $client->Id_Client,
        ]);
    }
}
