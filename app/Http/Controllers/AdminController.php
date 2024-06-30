<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Client;
use App\Models\Prestataire;
use App\Models\Reclamation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getAllPrestataires()
    {
        $prestataires = Prestataire::all();
        return response()->json($prestataires);
    }

    public function getAllClients()
    {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function getAllReclamations()
    {
        $reclamations = Reclamation::all();
        return response()->json($reclamations);
    }

    public function getAllAnnonces()
    {
        $Annonces = Annonce::whereNull('accepted_at')->get();
        return response()->json($Annonces);
    }

    public function banUsers()
    {
        $now = Carbon::now();

        User::whereNull('banned_at')->update(['banned_at' => $now]);

        return response()->json(['message' => 'Users have been banned successfully.']);
    }


}
