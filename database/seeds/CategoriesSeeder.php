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
            'logo' => 'Surfboard.png',
            'picture' => 'surfboards-category.jpg',
          ],
          [
            'category' => 'accesories',
            'display_name' => 'Accesorios',
            'logo' => 'accesorios.png',
            'picture' => 'accesories-category.jpg',
          ],
          [
            'category' => 'neoprene',
            'display_name' => 'Neoprene',
            'logo' => 'neoprene-clothes.png',
            'picture' => 'neoprene-clothes3-category.jpg',
          ],
          [
            'category' => 'clothes',
            'display_name' => 'Ropa',
            'logo' => 'clothes.png',
            'picture' => 'clothes-category.jpg',
          ],
          [
            'category' => 'footwear',
            'display_name' => 'Calzado',
            'logo' => 'footwear.png',
            'picture' => 'footwear-category.jpg',
          ],
        ]);
    }
}
