<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 100000; $i++) {
            DB::table('barang')->insert([
          'id_karyawan'   => $faker->numberBetween($min = 1, $max = 5),
          'nama_barang'   => $faker->name($gender = null|'male'|'female'),
          'harga'         => $faker->numberBetween($min = 2000, $max = 1000000),
          'jenis'         => $faker->text($maxNbChars = 50),
          // 'keuntungan'    => $faker->numberBetween($min = 10, $max = 15),
          'keuntungan'    => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 15),
          'gambar'        => '',
          'stok'          => $faker->numberBetween($min = 0, $max = 100)
        ]);
        }
    }
}
