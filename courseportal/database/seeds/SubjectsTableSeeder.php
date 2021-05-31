<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($a=1; $a<=10 ; $a++) {
            App\Subject::create([
            'name' => 'Subject '.$a,
            'duration' => rand(1,100),
            ]);
        }
    }
}
