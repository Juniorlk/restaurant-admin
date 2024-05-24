<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categorie extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Categorie';
    protected $fillable = ['Nom', 'Description'];

    public function plats()
    {
        return $this->hasMany(Plat::class, 'Id_Categorie');
    }
}

