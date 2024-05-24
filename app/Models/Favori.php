<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    protected $fillable = ['Client_Id', 'Plat_Id'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'Client_Id');
    }

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'Plat_Id');
    }
}
