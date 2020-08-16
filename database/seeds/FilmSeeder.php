<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Film\Film;

class FilmSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \Illuminate\Support\Collection::times(config('film.seeding_amount'), function () {
            factory(Film::class)->create();
        });
    }
}
