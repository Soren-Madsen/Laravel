<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FilmController extends Controller
{

    /**
     * Read films from storage
     */
  public static function readFilms(): array
    {
        $films = Storage::json('/public/films.json');
 
        return $films;
    }

    /**
     * List films older than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
            //  else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
            //     $title = "Listado de todas las pelis filtrado x categoria y año";
            //     $films_filtered[] = $film;
            // }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listAllFilms()
    {
        $films = FilmController::readFilms();
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
        $films = FilmController::readFilms();
        $count = is_array($films) ? count($films) : 0;
        return view('counter', ['count' => $count]);
    }

    // Devuelve una vista con las películas ordenadas por año
    public function sortFilmsByYear()
    {
        $films = FilmController::readFilms();
        usort($films, function ($a, $b) {
            return $a['year'] <=> $b['year'];
        });
        $title = "Listado de pelis ordenadas por año";
        return view('films.list', ['films' => $films, 'title' => $title]);
    }

    // Crea una nueva película y la guarda en el storage
    public function createFilm(Request $request)
    {
        $name = trim((string) $request->input('name'));

        
        if ($this->isFilm($name)) {
            return redirect('/')->with('error', 'La película ya existe.');
        }

        $films = FilmController::readFilms();
        $newFilm = [
            'name' => $name,
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'country' => $request->input('country'),
            'duration' => $request->input('duration'),
            'img_url' => $request->input('img_url'),
        ];

        $films[] = $newFilm;
        Storage::put('/public/films.json', json_encode($films));

        return $this->listAllFilms();
    }
    public function isFilm(string $name)    
    {
        if ($name === '') {
            return false;
        }

        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film['name'] === $name) {
                return true;
            }
        }
        return false;
    }
}
