<?php
namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'Id_Client';
    protected $fillable = ['Nom', 'Prenom', 'AdresseMail', 'MotDePasse', 'Telephone', 'Status'];

    protected $hidden = [
        'MotDePasse',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'Id_Client');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'Id_Client');
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class, 'Id_Client');
    }

    // Ajoutez un mutateur pour le mot de passe
    // public function setMotDePasseAttribute($value)
    // {
    //     $this->attributes['MotDePasse'] = bcrypt($value);
    // }

    // Redéfinir les méthodes de nommage de Laravel pour les champs email et password
    public function getAuthPassword()
    {
        return $this->MotDePasse;
    }

    public function getEmailForPasswordReset()
    {
        return $this->AdresseMail;
    }
}
