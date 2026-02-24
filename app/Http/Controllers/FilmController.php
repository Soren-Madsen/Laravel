<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{

    /**
     * Read films from database using Eloquent ORM
     */
    public static function readFilms()
    {
        return Film::all();
    }

    /**
     * List films older than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $old_films = Film::where('year', '<', $year)->get();
        
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $new_films = Film::where('year', '>=', $year)->get();
        
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $title = "Listado de todas las pelis";
        
        // Build query based on filters
        $query = Film::query();
        
        if (!is_null($year) && is_null($genre)) {
            $query->where('year', $year);
            $title = "Listado de todas las pelis filtrado x año";
        } elseif (is_null($year) && !is_null($genre)) {
            $query->whereRaw('LOWER(genre) = ?', [strtolower($genre)]);
            $title = "Listado de todas las pelis filtrado x categoria";
        }
        
        $films_filtered = $query->get();
        
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listAllFilms()
    {
        $films = Film::all();
        $title = "Listado de todas las pelis";
        return view('films.list', ['films' => $films, 'title' => $title]);
    }

    // Lista peliculas por año
    public function listFilmsByYear($year = null)
    {
        return $this->listFilms($year, null);
    }


    // Lista peliculas por género
    public function listFilmsByGenre($genre = null)
    {
        return $this->listFilms(null, $genre);
    }

     // Devuelve una vista con el total de películas
    public function countFilms()
    {
        $count = Film::count();
        return view('counter', ['count' => $count]);
    }

    // Devuelve una vista con las películas ordenadas por año
    public function sortFilmsByYear()
    {
        $films = Film::orderBy('year')->get();
        $title = "Listado de pelis ordenadas por año";
        return view('films.list', ['films' => $films, 'title' => $title]);
    }

    // Crea una nueva película y la guarda en la base de datos
    public function createFilm(Request $request)
    {
        $name = trim((string) $request->input('name'));

        if ($this->isFilm($name)) {
            return redirect('/')->with('error', 'La película ya existe.');
        }

        // Create new film using Eloquent
        Film::create([
            'name' => $name,
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'duration' => $request->input('duration'),
            'img_url' => $request->input('img_url'),
        ]);

        return $this->listAllFilms();
    }
    public function isFilm(string $name)    
    {
        if ($name === '') {
            return false;
        }

        return Film::where('name', $name)->exists();
    }
}
