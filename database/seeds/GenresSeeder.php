<?php

use Illuminate\Database\Seeder;
use App\Genres;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Genres::create([
            'name' => 'Teen Fiction',
        ]);
    }
}
