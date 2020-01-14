<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
          [
            'category' => 'boards',
            'display_name' => 'Tablas',
          ],
          [
            'category' => 'accesories',
            'display_name' => 'Accesorios',
          ],
          [
            'category' => 'neoprene',
            'display_name' => 'Neoprene',
          ],
          [
            'category' => 'clothes',
            'display_name' => 'Ropa',
          ],
          [
            'category' => 'footwear',
            'display_name' => 'Calzado',
          ],
        ]);
    }
}
