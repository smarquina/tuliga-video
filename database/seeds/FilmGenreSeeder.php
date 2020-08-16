<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Film\FilmGenre;

class FilmGenreSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        collect(['Acción', 'Aventuras', 'Infantil', 'Comedia', 'Thrillers', 'Románricas', 'Dramas', 'Ciencia ficción'])
            ->each(function ($name) {
                (new FilmGenre(['name' => $name]))->save();
            });
    }
}
