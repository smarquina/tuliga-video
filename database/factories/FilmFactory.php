<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Http\Models\Film\Film;
use App\Http\Models\Film\FilmGenre;
use App\Http\Models\Film\FilmType;
use Faker\Generator as Faker;

$factory->define(Film::class, function (Faker $faker) {
    $genres = FilmGenre::all();
    $types  = FilmType::all();

    return [
        'name'          => $faker->unique()->name,
        'description'   => $faker->realText(250),
        'film_genre_id' => $genres->random(),
        'film_type_id'  => $types->random(),
        'image'         => $faker->unique()->image('public/storage/films', 640, 480, null, false),
    ];
});
