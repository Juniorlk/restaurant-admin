<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Client';
    protected $fillable = ['Nom', 'Prenom', 'AdresseMail', 'MotDePasse', 'Telephone'];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'Client_Id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Client_Id');
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class, 'Client_Id');
    }
}
