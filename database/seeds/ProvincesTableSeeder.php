<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->insert([
          ['name' => 'Buenos Aires'],
          ['name' => 'Córdoba'],
          ['name' => 'Santa Fé'],
          ['name' => 'Entre Ríos'],
          ['name' => 'Río Negro']
        ]);

        DB::table('addresses')->insert([
          'address' => 'Fake address 111',
          'city' => 'Fake city',
          'province_id' => '2',
          'zip' => '6666'
        ]);
    }
}
