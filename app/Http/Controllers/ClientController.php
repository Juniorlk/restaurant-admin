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
}
