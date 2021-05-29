<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($a=1 ; $a<=100; $a++)
        {
            $name = $faker->unique()->name;
            $email = $faker->unique()->email;
            $birthdate = $faker->date;
            $password = bcrypt('12345');
            App\Teacher::create([
                'name' => $name,
                'birthdate' => $birthdate,
                'short_description' => '-',
            ]);
            App\User::create([
                'email' => $email,
                'password' => $password,
                'actor_id' => 2,
                'foreign_id' => App\Teacher::max('id'),
            ]);
        }
    }
}
