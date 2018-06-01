<?php

use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apartments')->insert([
            'name' => str_random(10),
            'address' => str_random(20),
            'price' => random_int(1, 10).'m/m2',
            'information' => str_random(10),
            'information_detail' => str_random(30),
            'img_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN6IjEKn5hCBUYCruv78gMEG5fKD0Eo1Lp7uzzcw766rXc0yGl',
            'status' => 1,
        ]);
    }
}
