<?php

use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<=100; $i++) {
            DB::table('tasks')->insert([
                'title' => str_random(10),
                'body' => str_random(100),
                'complete' => true,
                'user_id' => 2


            ]);

        }
    }
}
