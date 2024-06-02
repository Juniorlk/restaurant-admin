<?php

namespace App\Models;

use App\Models\Plat;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id_Commande';


//     protected $table = 'commandes';
//     protected $fillable = ['numero', 'Client_Id', 'montant', 'etat'] ;

//     public function client()
//     {
//         return $this->belongsTo(Client::class, 'Client_Id');

    protected $fillable = [
        'Id_Client',
        'Date_heure',
        'Mode_paiement',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'Id_Client');

    }
    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'commandes_plat', 'Id_Commande','Id_Plat')
                    ->withPivot('quantite'); // Si vous avez un champ pivot 'quantite'
    }

}
