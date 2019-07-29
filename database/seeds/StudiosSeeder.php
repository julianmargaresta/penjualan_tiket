<?php

use Illuminate\Database\Seeder;
use App\Studios;
class StudiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Studios::create([
            'name' => 'Premier 3',
            'quota' => '40',
            'price' => 25000,
            
        ]);
    }
}
