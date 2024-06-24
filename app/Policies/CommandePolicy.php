<?php

namespace App\Policies;

use App\Models\Commande;
use App\Models\Client;
use Illuminate\Auth\Access\Response;

class CommandePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    use HandlesAuthorization;

    public function viewAny(Client $client): bool
    {
        //
    }

    /**
     * Determine whether the client can view the model.
     */
    public function view(Client $client, Commande $commande)
    {
        return $client->Id_Client === $commande->Id_Client;
    }

    /**
     * Determine whether the client can create models.
     */
    public function create(Client $client): bool
    {
        //
    }

    /**
     * Determine whether the client can update the model.
     */
    public function update(Client $client, Commande $commande)
    {
        return $client->Id_Client === $commande->Id_Client;
    }

    /**
     * Determine whether the client can delete the model.
     */
    public function delete(Client $client, Commande $commande)
    {
        return $client->Id_Client === $commande->Id_Client;
    }

    /**
     * Determine whether the client can restore the model.
     */
    public function restore(Client $client, Commande $commande): bool
    {
        //
    }

    /**
     * Determine whether the client can permanently delete the model.
     */
    public function forceDelete(Client $client, Commande $commande): bool
    {
        //
    }
}
