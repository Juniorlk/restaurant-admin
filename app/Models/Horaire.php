<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Horaire';
    protected $fillable = ['Jour', 'Heure_debut', 'Heure_fin'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Horaire_Id');
    }
}
