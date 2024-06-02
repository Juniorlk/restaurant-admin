<?php

namespace App\Models;

use App\Models\Table;
use App\Models\Client;
use App\Models\Horaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Reservation';
    protected $fillable = ['Date_heure', 'Mode_paiement', 'Nombre_personnes', 'Statut'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_Id');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'Table_Id');
    }

    public function horaire()
    {
        return $this->belongsTo(Horaire::class, 'Horaire_Id');
    }
}
