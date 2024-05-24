<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $primaryKey = 'Id_Table';
    protected $fillable = ['Numero_de_table', 'Capacite'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Table_Id');
    }
}
