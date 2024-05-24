<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        DB::table('clients')->insert([
            [
                'Nom' => 'Doe',
                'Prenom' => 'John',
                'AdresseMail' => 'john.doe@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '1234567890',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Smith',
                'Prenom' => 'Jane',
                'AdresseMail' => 'jane.smith@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '0987654321',
                'Date_heure' => now()
            ],
        ]);


        DB::table('categories')->insert([
            [
                'Nom' => 'Entrées',
                'Description' => 'Les meilleures entrées.'
            ],
            [
                'Nom' => 'Desserts',
                'Description' => 'Les meilleurs desserts.'
            ],
        ]);

        DB::table('plats')->insert([
            [
                'Nom' => 'Salade César',
                'Description' => 'Une salade verte avec poulet grillé.',
                'Prix' => 12.99,
                'Photos' => 'salade_cesar.jpg',
                'Allergenes' => 'Lait, Gluten',
                'Type_plat' => 'Entrée',
                'Id_Categorie' => 1
            ],
            [
                'Nom' => 'Tiramisu',
                'Description' => 'Un délicieux dessert italien.',
                'Prix' => 7.99,
                'Photos' => 'tiramisu.jpg',
                'Allergenes' => 'Lait, Œufs',
                'Type_plat' => 'Dessert',
                'Id_Categorie' => 2
            ],
        ]);

        DB::table('administrateurs')->insert([
            [
                'Nom' => 'Admin1',
                'AdresseMail' => 'admin1@example.com',
                'MotDePasse' => Hash::make('adminpassword')
            ],
            [
                'Nom' => 'Admin2',
                'AdresseMail' => 'admin2@example.com',
                'MotDePasse' => Hash::make('adminpassword')
            ],
        ]);


        DB::table('horaires')->insert([
            [
                'Jour' => 'Lundi',
                'Heure_debut' => '12:00:00',
                'Heure_fin' => '14:00:00'
            ],
            [
                'Jour' => 'Mardi',
                'Heure_debut' => '12:00:00',
                'Heure_fin' => '14:00:00'
            ],
        ]);


        DB::table('tables')->insert([
            [
                'Numero_de_table' => 1,
                'Capacité' => 4
            ],
            [
                'Numero_de_table' => 2,
                'Capacité' => 2
            ],
        ]);


        DB::table('commandes')->insert([
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Client_Id' => 1
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Client_Id' => 2
            ],
        ]);


        DB::table('reservations')->insert([
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Client_Id' => 1,
                'Table_Id' => 1,
                'Horaire_Id' => 1,
                'Nombre_personnes' => 4,
                'Statut' => 'Confirmée'
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Client_Id' => 2,
                'Table_Id' => 2,
                'Horaire_Id' => 2,
                'Nombre_personnes' => 2,
                'Statut' => 'Confirmée'
            ],
        ]);



        DB::table('commandes_plat')->insert([
            [
                'Id_Commande' => 1,
                'Id_Plat' => 1
            ],
            [
                'Id_Commande' => 2,
                'Id_Plat' => 2
            ],
        ]);


        DB::table('favoris')->insert([
            [
                'Client_Id' => 1,
                'Plat_Id' => 1
            ],
            [
                'Client_Id' => 2,
                'Plat_Id' => 2
            ],
        ]);


    }
}
