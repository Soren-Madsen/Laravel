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

    /**
     * Count total number of actors in the database
     * 
     * @return \Illuminate\View\View
     */
    public function countActors()
    {
        $count = Actor::count();
        
        return view('actors.count', ['count' => $count]);
    }

    public function destroy($id)
    {
    $actor = Actor::find($id);

    if (!$actor) {
        return response()->json(['action' => 'delete', 'status' => false, 'message' => 'Actor not found'], 404);
    }

    $actor->delete();

    return response()->json(['action' => 'delete', 'status' => true, 'message' => 'Actor deleted successfully'], 200);
}
}
