<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Film\FilmType;

class FilmTypeSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        collect([
            ['name'         => 'Nuevos lanzamientos',
             'normal_days'  => 0,
             'normal_price' => null,
             'extra_price'  => null],
            ['name'         => 'Películas normales',
             'normal_days'  => 3,
             'normal_price' => null,
             'extra_price'  => 5],
            ['name'         => 'Películas viejas',
             'normal_days'  => 5,
             'normal_price' => null,
             'extra_price'  => 4]
        ])
            ->each(static function ($type) {
                (new FilmType($type))->save();
            });
    }
}
