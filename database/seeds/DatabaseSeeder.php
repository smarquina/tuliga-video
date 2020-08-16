<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(FilmGenreSeeder::class);
        $this->call(FilmTypeSeeder::class);
        $this->call(FilmSeeder::class);
    }
}
