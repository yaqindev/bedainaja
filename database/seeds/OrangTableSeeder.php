<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            DB::table('orang')->insert([
            'nama_orang'    => $faker->name($gender = null|'male'|'female'),
            'tinggi_badan'  => $faker->numberBetween($min = 140, $max = 200),
            // 'tinggi_badan'  => 0.44,
            'bentuk_tubuh'  => $faker->sentence($nbWords = 3, $variableNbWords = true),
            'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'alamat'        => $faker->text($maxNbChars = 250),
            'no_telepon'    => $faker->e164PhoneNumber
          ]);
        }
    }
}
