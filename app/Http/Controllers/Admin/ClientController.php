<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
       $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'AdresseMail' => 'required|email',
            'MotDePasse' => 'required|string|min:8|max:255',
            'Telephone' => 'required|string|max:20',
        ]);

        $client = new Client();
        $client->Nom = $request->Nom;
        $client->Prenom = $request->Prenom;
        $client->AdresseMail = $request->AdresseMail;
        $client->MotDePasse = bcrypt($request->MotDePasse); // Hash the password before saving
        $client->Telephone = $request->Telephone;
        $client->save();

        return redirect('/ajout')->with('status', 'Le client a bien été ajouté avec succès.');
    }



    public function update_client_traitement(Request $request){

        $request->validate([
            'Nom' => 'required',
            'Prenom'=> 'required',
            'AdresseMail'=> 'required',
            'MotDePasse'=> 'required',
            'Telephone'=> 'required',
        ]);

        $client = Client::find($request->client_id);
        $client->client_id = $request->client_id;
        $client->Nom = $request->Nom;
        $client->Prenom = $request->Prenom;
        $client->AdresseMail = $request->AdresseMail;
        $client->MotDePasse = $request->MotDePasse;
        $client->Telephone = $request->Telephone;
        $client->update();

        return redirect('/client')->with('status','Le client a bien ete modifer avec succes.');


    }

    public function destroy($client_id){
        $client = Client::find($client_id);
        $client->delete();
        return redirect()->back()->with('status','Le client a bien ete supprimer avec succes.');

    }

    //  public function show_client($id)
    //     {
    //         $client = Client::findOrFail($id);
    //         $commandes = Commande::where('Id_Client', $id)->get();

    //         return view('admin.clients.show', compact('client', 'commandes'));
    //     }

        public function desactiver(Client $client)
        {
            $client->Statut = 'inactif';
            $client->save();

            return redirect()->route('client.index')->with('success', 'Le compte client a été désactivé.');
        }

        public function reactiver(Client $client)
        {
            $client->Statut = 'actif';
            $client->save();

            return redirect()->route('client.index')->with('success', 'Le compte client a été réactivé.');
        }

}
