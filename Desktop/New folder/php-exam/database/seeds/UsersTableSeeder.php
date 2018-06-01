<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
               'name' => 'Pussy',
            ],
            [
                'name' => str_random(10),
            ]
        ]);

    }
}
