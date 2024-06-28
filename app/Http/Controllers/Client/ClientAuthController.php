<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;



class ClientAuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $client = Client::create([
            'Nom' => $request->Nom,
            'Prenom' => $request->Prenom,
            'AdresseMail' => $request->AdresseMail,
            'MotDePasse' => Hash::make($request->MotDePasse),
            'Telephone' => $request->Telephone,
        ]);

        $token = $client->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'AdresseMail' => 'required|string|email',
            'MotDePasse' => 'required|string',
        ]);

        $client = Client::where('AdresseMail', $request->AdresseMail)->first();

        if (! $client || ! Hash::check($request->MotDePasse, $client->MotDePasse)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $token = $client->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'client' => $client
        ]);
    }

    public function logout(Request $request)
    {
        $request->user('sanctum')->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully',
        ]);
    }
}
