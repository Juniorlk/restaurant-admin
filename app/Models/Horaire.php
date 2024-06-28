<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horaire extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Horaire';
    protected $fillable = ['Jour', 'Heure_debut', 'Heure_fin'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Id_Horaire');
    }
}
