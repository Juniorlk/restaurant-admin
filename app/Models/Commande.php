<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id_Commande';

    protected $fillable = [
        'Id_Client',
        'Date_heure',
        'Mode_paiement',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'Id_Client');
    }

}
