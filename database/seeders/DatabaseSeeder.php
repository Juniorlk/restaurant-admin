<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


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
            [
                'Nom' => 'Brown',
                'Prenom' => 'Charlie',
                'AdresseMail' => 'charlie.brown@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '1122334455',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Johnson',
                'Prenom' => 'Emily',
                'AdresseMail' => 'emily.johnson@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '2233445566',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Williams',
                'Prenom' => 'Michael',
                'AdresseMail' => 'michael.williams@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '3344556677',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Jones',
                'Prenom' => 'Olivia',
                'AdresseMail' => 'olivia.jones@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '4455667788',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Garcia',
                'Prenom' => 'Daniel',
                'AdresseMail' => 'daniel.garcia@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '5566778899',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Miller',
                'Prenom' => 'Sophia',
                'AdresseMail' => 'sophia.miller@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '6677889900',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Davis',
                'Prenom' => 'David',
                'AdresseMail' => 'david.davis@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '7788990011',
                'Date_heure' => now()
            ],
            [
                'Nom' => 'Martinez',
                'Prenom' => 'Emma',
                'AdresseMail' => 'emma.martinez@example.com',
                'MotDePasse' => Hash::make('password'),
                'Telephone' => '8899001122',
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

        // DB::table('plats')->insert([
        //     [
        //         'Nom' => 'Salade César',
        //         'Description' => 'Une salade verte avec poulet grillé.',
        //         'Prix' => 12.99,
        //         'Photos' => 'salade_cesar.jpg',
        //         'Allergenes' => 'Lait, Gluten',
        //         'Type_plat' => 'Entrée',
        //         'Id_Categorie' => 1
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        //     [
        //         'Nom' => 'Tiramisu',
        //         'Description' => 'Un délicieux dessert italien.',
        //         'Prix' => 7.99,
        //         'Photos' => 'tiramisu.jpg',
        //         'Allergenes' => 'Lait, Œufs',
        //         'Type_plat' => 'Dessert',
        //         'Id_Categorie' => 2
        //     ],
        // ]);

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
                'Capacite' => 4
            ],
            [
                'Numero_de_table' => 2,
                'Capacite' => 2
            ],
        ]);


        DB::table('commandes')->insert([
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Prix' => 25000,
                'Id_Client' => 1
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Prix' => 20000,
                'Id_Client' => 2
            ],[
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Prix' => 30.00,
                'Id_Client' => 3
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Prix' => 15.00,
                'Id_Client' => 4
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Prix' => 35.00,
                'Id_Client' => 5
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Prix' => 40.00,
                'Id_Client' => 6
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Prix' => 45.00,
                'Id_Client' => 7
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Prix' => 50.00,
                'Id_Client' => 8
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Prix' => 55.00,
                'Id_Client' => 9
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Prix' => 60.00,
                'Id_Client' => 10
            ],
        ]);


        DB::table('reservations')->insert([
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'Carte de crédit',
                'Id_Client' => 1,
                'Id_Table' => 1,
                'Id_Horaire' => 1,
                'Nombre_personnes' => 4,
                'Statut' => 1
            ],
            [
                'Date_heure' => now(),
                'Mode_paiement' => 'PayPal',
                'Id_Client' => 2,
                'Id_Table' => 2,
                'Id_Horaire' => 2,
                'Nombre_personnes' => 2,
                'Statut' => 1
            ],
        ]);



        // DB::table('commandes_plat')->insert([
        //     [
        //         'Id_Commande' => 1,
        //         'Id_Plat' => 1,
        //         'quantite' => 1000
        //     ],
        //     [
        //         'Id_Commande' => 2,
        //         'Id_Plat' => 2,
        //         'quantite' => 1000
        //     ],
        //     [
        //         'Quantite' => 1,
        //         'Id_Commande' => 1,
        //         'Id_Plat' => 2
        //     ],
        //     // Ajout de 8 autres enregistrements
        //     [
        //         'Quantite' => 1,
        //         'Id_Commande' => 2,
        //         'Id_Plat' => 3
        //     ],
        //     [
        //         'Quantite' => 3,
        //         'Id_Commande' => 3,
        //         'Id_Plat' => 4
        //     ],
        //     [
        //         'Quantite' => 2,
        //         'Id_Commande' => 4,
        //         'Id_Plat' => 5
        //     ],
        //     [
        //         'Quantite' => 1,
        //         'Id_Commande' => 5,
        //         'Id_Plat' => 6
        //     ],
        //     [
        //         'Quantite' => 1,
        //         'Id_Commande' => 6,
        //         'Id_Plat' => 7
        //     ]
        // ]);


        // DB::table('favoris')->insert([
        //     [
        //         'Id_Client' => 1,
        //         'Id_Plat' => 1
        //     ],
        //     [
        //         'Id_Client' => 2,
        //         'Id_Plat' => 2
        //     ],
        // ]);


    }
}

