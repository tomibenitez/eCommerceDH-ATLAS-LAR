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
          ['category' => 'boards'],
          ['category' => 'accesories'],
          ['category' => 'neoprene'],
          ['category' => 'clothes'],
          ['category' => 'footwear'],
        ]);
    }
}
