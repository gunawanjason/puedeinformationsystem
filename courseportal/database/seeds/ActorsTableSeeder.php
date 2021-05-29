<?php

use Illuminate\Database\Seeder;

class ActorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Actor::create([
            'id' => 1,
            'name' => 'students',
        ]);
        App\Actor::create([
            'id' => 2,
            'name' => 'teachers',
        ]);
        App\Actor::create([
            'id' => 3,
            'name' => 'staff',
        ]);
    }
}
