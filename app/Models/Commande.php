<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';
    protected $fillable = ['numero', 'Client_Id', 'montant', 'etat'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_Id');
    }
}
