<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Plat';
    protected $fillable = ['Nom', 'Description', 'Prix', 'Photos', 'Allergenes', 'Type_plat', 'Id_Categorie'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'Id_Categorie');
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commandes_plat', 'Id_Plat', 'Id_Commande');
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class, 'Plat_Id');
    }
}
