<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FilmTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // prepare a predictable films.json in storage
        Storage::fake('local');
        $initial = [
            [
                'name' => 'Existing Film',
                'year' => 2001,
                'genre' => 'Drama',
                'country' => 'USA',
                'duration' => '120',
                'img_url' => 'https://example.com/existing.jpg',
            ]
        ];
        // write to the same path used by the controller
        Storage::put('public/films.json', json_encode($initial));
    }

    public function test_can_add_film_and_it_appears_in_list()
    {
        $data = [
            'name' => 'New Film',
            'year' => 2020,
            'genre' => 'Action',
            'country' => 'UK',
            'duration' => '100',
            'img_url' => 'https://example.com/new.jpg',
        ];

        $response = $this->post(route('film'), $data);

        $response->assertStatus(200);
        $response->assertSee('New Film');
    }

    public function test_invalid_image_url_shows_error()
    {
        $data = [
            'name' => 'Bad Url Film',
            'year' => 2019,
            'genre' => 'Comedy',
            'country' => 'FR',
            'duration' => '90',
            'img_url' => 'not-a-valid-url',
        ];

        $response = $this->post(route('film'), $data);

        // middleware should redirect back to / with error
        $response->assertRedirect('/');
        $response = $this->followRedirects($response);
        $response->assertSee('La URL proporcionada no es válida.');
    }

    public function test_duplicate_film_name_shows_error()
    {
        $data = [
            'name' => 'Existing Film',
            'year' => 2005,
            'genre' => 'Thriller',
            'country' => 'DE',
            'duration' => '110',
            'img_url' => 'https://example.com/dup.jpg',
        ];

        $response = $this->post(route('film'), $data);

        $response->assertRedirect('/');
        $response = $this->followRedirects($response);
        $response->assertSee('La película ya existe.');
    }

    public function test_header_and_footer_present_on_pages()
    {
        $pages = ['/', route('countFilms'), route('oldFilms')];

        foreach ($pages as $page) {
            $response = $this->get($page);
            $response->assertStatus(200);
            // header and footer use images; ensure some header text exists (alt or hr)
            $response->assertSee('<hr', false);
        }
    }
}
