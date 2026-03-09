<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    /**
     * List all actors with their corresponding columns
     */
    public function listActors()
    {
        $actors = Actor::all();
        $title = "Listado de Actores";
        
        return view('actors.list', ['actors' => $actors, 'title' => $title]);
    }

    /**
     * List actors by decade based on birthdate
     * 
     * @param int $year The starting year of the decade
     * @return \Illuminate\View\View
     */
    public function listActorsByDecade($year)
    {
        $startYear = $year;
        $endYear = $year + 9;
        
        $actors = Actor::whereYear('birthdate', '>=', $startYear)
                       ->whereYear('birthdate', '<=', $endYear)
                       ->get();
        
        $title = "Actores nacidos en la década de {$startYear}-{$endYear}";
        
        return view('actors.list', ['actors' => $actors, 'title' => $title]);
    }
}
