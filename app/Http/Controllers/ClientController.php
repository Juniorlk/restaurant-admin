<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function liste_Client()
    {
        $clients = Client::all();
        return view('client.liste', compact('clients'));
    }

    public function ajouter_client()
    {
        return view('client.ajouter');
    }

    public function ajouter_client_traitement(Request $request)
    {
        $request->validate([
            'Id_Client'=> 'required',
            'Nom' => 'required',
            'Prenom'=> 'required',
            'AdresseMail'=> 'required',
            'MotDePasse'=> 'required',
            'Telephone'=> 'required',
        ]);

        $client = new Client();
        $client->client_id = $request->client_id;
        $client->Nom = $request->Nom;
        $client->Prenom = $request->Prenom;
        $client->AdresseMail = $request->AdresseMail;
        $client->MotDePasse = $request->MotDePasse;
        $client->Telephone = $request->Telephone;
        $client->save();

        return redirect('/client')->with('status','Le client a bien ete ajoute avec succes.');
    }
   
    public function update_client($client_id){
        return view('client.update');
    }

    public function update_client_traitement(Request $request){

        $request->validate([
            'Id_Client'=> 'required',
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

    public function delete_client($client_id){
        $client = Client::find($client_id);
        $client->delete();
        return redirect('/client')->with('status','Le client a bien ete supprimer avec succes.');

    }

}
