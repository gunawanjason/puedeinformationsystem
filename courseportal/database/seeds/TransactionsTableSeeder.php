<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($a=1; $a<=100 ; $a++) {
            for ($b=1; $b<=2; $b++) {
                App\Transaction::create([
                'student_id' => $a,
                'teacher_id' => rand(1,100),
                'subject_id' => rand(1,10),
                ]);
            }
        }
    }
}
