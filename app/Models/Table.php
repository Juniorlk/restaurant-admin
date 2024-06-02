<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
