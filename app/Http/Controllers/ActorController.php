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
}
