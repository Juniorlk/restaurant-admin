<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandePlat extends Model
{
    use HasFactory;

    protected $table = 'commandes_plat';
    protected $fillable = ['Id_Commande', 'Id_Plat'];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'Id_Commande');
    }

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'Id_Plat');
    }
}
