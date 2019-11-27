<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('ls_states')->insert([
            'statename' => "Gujrat",
        ]);

        DB::table('ls_states')->insert([
            'statename' => "Maharastra",
        ]);

        DB::table('ls_states')->insert([
            'statename' => "Punjab",
        ]);

        /*cities table*/
        DB::table('ls_cities')->insert([
            'cityname' => "Surat",
            'stateid' => 1,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Ahmedabad",
            'stateid' => 1,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Baroda",
            'stateid' => 1,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Mumbai",
            'stateid' => 2,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Puna",
            'stateid' => 2,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Lundhiyana",
            'stateid' => 3,
        ]);

        DB::table('ls_cities')->insert([
            'cityname' => "Chittorgadh",
            'stateid' => 3,
        ]);




    }
}
